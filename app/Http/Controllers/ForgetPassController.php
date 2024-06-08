<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class ForgetPassController extends Controller
{
    public function ForgetPass()
    {
        return view('forget');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $email = $request->input('email');
        $newPassword = $request->input('new_password');

        // Check if the user is logged in
        if (session()->has('id_cust') || Cookie::get('id_cust') != null) {
            $id_cust = session('id_cust', Cookie::get('id_cust'));

            // Validate the old password
            $request->validate([
                'old_password' => 'required',
            ]);

            $oldPassword = $request->input('old_password');

            // Retrieve the user by ID
            $user = DB::table('customer')->where('id_cust', $id_cust)->first();

            if (!$user || !Hash::check($oldPassword, $user->PASSWORD_HASH)) {
                return redirect()->back()->withErrors(['old_password' => 'The provided old password does not match our records.']);
            }

            // Update the user's password
            DB::table('customer')->where('id_cust', $id_cust)->update(['password_hash' => Hash::make($newPassword)]);
        } else {
            // Retrieve the user by email and phone for password reset
            $request->validate([
                'phone' => 'required',
            ]);

            $phone = $request->input('phone');
            $user = DB::table('customer')->where('email', $email)->where('phone', $phone)->first();

            if (!$user) {
                return redirect()->back()->withErrors(['email' => 'No matching user found with the provided email and phone number.']);
            }

            // Update the user's password
            DB::table('customer')->where('id_cust', $user->id_cust)->update(['password_hash' => Hash::make($newPassword)]);
        }

        return redirect()->route('login')->with('success', 'Password has been successfully reset.');

    }
}
