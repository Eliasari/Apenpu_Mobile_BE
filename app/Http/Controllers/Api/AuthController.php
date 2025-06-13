<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => ['required', 'email', 'exists:customer,email'],
            'password' => ['required'],
        ]);

        // Mencari user berdasarkan email
        $user = Customer::where('email', $request->email)->first();

        // Cek apakah password cocok
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);  // Unauthorized status
        }

        // Buat token untuk user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Kembalikan response JSON dengan token
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'nama_customer' => ['required'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
                'password' => ['required'],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $e->errors(),
            ], 422);
        }

        $user = Customer::create([
            'nama_customer' => $request->nama_customer,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
}
