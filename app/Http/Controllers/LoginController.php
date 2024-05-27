<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function LoginAction(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the user from the database
        $DBuser = DB::table('customer')->where('email', $credentials['email'])->first();

        // Check if the user exists and the password_hash field is available
        if ($DBuser !== null) {
            // Verify the password
            if (Hash::check($credentials['password'], $DBuser->PASSWORD_HASH)) {
                // Handle "remember me" functionality
                if ($request->has('remember')) {
                    Cookie::queue('id_cust', $DBuser->ID_CUST, 60 * 24 * 7);
                    Cookie::queue('email', $DBuser->EMAIL, 60 * 24 * 7);
                    // Do not store password or password hashes in cookies
                } else {
                    $request->session()->put('id_cust', $DBuser->ID_CUST);
                    $request->session()->put('email', $DBuser->EMAIL);
                    // Do not store password or password hashes in the session
                }

                return redirect('/')->with('success', 'Login Successful');
            } else {
                return redirect('/login')->with('error', 'Login Failed! Please Try Again.');
            }
        } else {
            return redirect('/login')->with('error', 'Login Failed! Please Try Again.');
        }
    }

}
