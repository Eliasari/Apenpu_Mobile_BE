<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerRegisterController extends Controller
{
    public function register()
    {
        return view('frontenduser.auth.register');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'email'     => 'required|string|email|max:50|unique:customer',
            'password'  => 'required|string|max:255',
        ]);

        DB::table('customer')->insert([
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        return redirect('/customerlogin')->withSuccess('User successfully registered.');
    }
}
