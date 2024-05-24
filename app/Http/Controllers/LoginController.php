<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function LoginAction(Request $request)
    {
        $val = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt([
            "email" => $val['email'],
            "password" => $val['password'],
            "roles" => "user"
        ]))
        {
            return \redirect("/")
                ->with("success", "Welcome back {$val['email']}");
        }
        else
        {
            return \redirect()
                ->back()
                ->withErrors(["msg" => "Email or password is wrong! Please recheck"]);
        }
    }
}
