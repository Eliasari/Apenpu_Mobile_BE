<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileCustomerController extends Controller
{
    public function getAll()
    {
        $customers = Customer::all();

        return response()->json([
            'message' => 'Data customer berhasil diambil',
            'data' => $customers,
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customer,email',
            'password' => 'required|min:6',
        ]);

        $customer = Customer::create([
            'alamat' => $request->alamat,
            'no_pembeli' => $request->no_pembeli,
            'nama_customer' => $request->nama_customer,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Customer berhasil dibuat',
            'data' => $customer,
        ], 201);
    }

        //     {
        //     "Customer_ID": 3,
        //     "alamat": "pekanbaru",
        //     "no_pembeli": "085778445682",
        //     "nama_customer": "masadi",
        //     "email": "customer2@gmail.com",
        //     "created_at": "2025-05-12T16:05:06.000000Z",
        //     "updated_at": "2025-05-12T16:48:33.000000Z"
        // },
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json([
                'message' => 'Customer tidak ditemukan',
                'data' => null,
            ], 404);
        }

        $request->validate([
            'email' => 'sometimes|email|unique:customer,email,' . $id . ',Customer_ID',
            'password' => 'nullable|min:6',
        ]);

        $customer->alamat = $request->alamat ?? $customer->alamat;
        $customer->no_pembeli = $request->no_pembeli ?? $customer->no_pembeli;
        $customer->nama_customer = $request->nama_customer ?? $customer->nama_customer;
        $customer->email = $request->email ?? $customer->email;

        if ($request->filled('password')) {
            $customer->password = Hash::make($request->password);
        }

        $customer->save();

        return response()->json([
            'message' => 'Customer berhasil diperbarui',
            'data' => $customer,
        ], 200);
    }

    public function update2(Request $request)
    {
        $currentCustomer = $request->user();

        if (!$currentCustomer) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        $profile = Customer::find($currentCustomer->Customer_ID);
        if (!$profile) {
            return response()->json(['error' => 'Profile not found.'], 404);
        }
        $profile->alamat = $request->input('alamat', $profile->alamat);
        $profile->no_pembeli = $request->input('no_pembeli', $profile->no_pembeli);
        $profile->nama_customer = $request->input('nama_customer', $profile->nama_customer);
        $profile->email = $request->input('email', $profile->email);
        if ($request->filled('password')) {
            $profile->password = Hash::make($request->input('password'));
        }
        $profile->save();
        
        return response()->json([
            'message' => 'Profile berhasil diperbarui',
            'data' => $profile,
        ], 200);
    }

    public function delete($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json([
                'message' => 'Customer tidak ditemukan',
            ], 404);
        }

        $customer->delete();

        return response()->json([
            'message' => 'Customer berhasil dihapus',
        ], 200);
    }
}

