<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function Register()
    {
        return view('register');
    }

    public function RegisterAction(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'address' => 'required',
        ]);
        $insert = DB::table('customer')->insert([
            'email' => $validatedData['email'],
            'password_hash' => Hash::make($validatedData['password']),
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
        ]);
        if ($insert) {
            return redirect('/login')->with('success', 'Registration successful!');
        } else {
            return redirect('/register')->with('error', 'Error registering, please try again.');
        }
    }
}
