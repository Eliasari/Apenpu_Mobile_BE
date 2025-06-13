<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;


class CustomerAuthController extends Controller
{
    public function login()
    {

    return view('frontenduser.auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil customer berdasarkan email menggunakan Eloquent
        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            // Login menggunakan customer_id
            Auth::guard('customer')->login($customer);
            Log::info('User logged in: ', ['customer' => $customer]);
            return redirect('/')->with('success', 'Anda berhasil login');
        }

        return redirect()->route('customerlogin')
            ->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        return redirect('/customerlogin');
    }
}
