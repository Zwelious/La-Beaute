<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        $DBadmin = DB::table('adminlogin')->where('email', $credentials['email'])->where('admin-pin', $credentials['password'])->first();

        if (!$DBadmin == null)
        {
            $request->session()->put('admin', $DBadmin->EMAIL);
            return redirect('/admin');
        }
        else
        {
            $DBuser = DB::table('customer')->where('email', $credentials['email'])->first();

            // Check if the user exists and the password_hash field is available
            if ($DBuser !== null) {
                // Verify the password
                if (Hash::check($credentials['password'], $DBuser->PASSWORD_HASH)) {
                    // Handle "remember me" functionality
                    if ($request->has('remember')) {
                        Cookie::queue('id_cust', $DBuser->ID_CUST, 60 * 24 * 7);
                        Cookie::queue('email', $DBuser->EMAIL, 60 * 24 * 7);
                        Cookie::queue('name', $DBuser->NAME, 60 * 24 * 7);
                        // Do not store password or password hashes in cookies
                    } else {
                        $request->session()->put('id_cust', $DBuser->ID_CUST);
                        $request->session()->put('email', $DBuser->EMAIL);
                        $request->session()->put('name', $DBuser->NAME);
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

    public function Logout(Request $request)
    {
        if (session()->has('id_cust') || Cookie::get('id_cust') != null) {
            session()->pull('id_cust');
            session()->pull('name');
            session()->pull('email');

            Cookie::queue(Cookie::forget('id_cust'));
            Cookie::queue(Cookie::forget('name'));
            Cookie::queue(Cookie::forget('email'));
        }
        return redirect('/');
    }
}
