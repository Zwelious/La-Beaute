<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function Checkout()
    {
        return view('checkout');
    }

    public function checkoutSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'house' => 'required',
            'postalCode' => 'required',
            'zip' => 'required',
            'cardholderName' => 'required',
            'cardNumber' => 'required|regex:/^\d{16}$/',
            'expirationDate' => 'required|regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
            'cvv' => 'required|regex:/^\d{3}$/',
        ]);

        return redirect()->route('checkout')->with('success', 'Checkout successful!');
    }
}



