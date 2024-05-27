<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function LoginAction(Request $request)
    {
        $user = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $DBuser = DB::table('customer')
        ->where('email', '=', $user['email'])
        ->first();
        $remember = ($request->has('remember')) ? true : false;
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if($DBuser !== null) {
            if(password_verify($request->password, $DBuser->password) )
            {
                if ($remember == true) {
                    Cookie::queue('id_cust', $DBuser->id_cust, 60 * 24 * 7);
                    Cookie::queue('email', $DBuser->email, 60 * 24 * 7);
                    Cookie::queue('password_hash', $DBuser->password_hash, 60 * 24 * 7);
                }
                else{
                    $request->session()->put('id_cust', $DBuser->id_cust );
                    $request->session()->put('email', $DBuser->email);
                    $request->session()->put('password_hash', $DBuser->password_hash );
                }
                return redirect('/')->with('success','Login Succesfull');
                //dd($request->cookies->all());
                // if($DBuser->ROLES == 'User')
                //     return redirect('/')->with('success','Login Succesfull');
                // else
                // {
                //     return redirect('/admin/transaction')->with('success','Login Succesfull');
                // }
            }
            else{
                //dd($request->cookies->all());
                return redirect('/login')->with('error','Login Failed! Please Try Again.');
            }
        }
        else{
            return redirect('/login')->with('error','Login Failed! Please Try Again.');
        }
    }
}
