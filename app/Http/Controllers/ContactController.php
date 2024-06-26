<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function Contact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'message' => 'required|string',
        ]);

        DB::table('message')->insert([
            'NAME' => $request->input('name'),
            'EMAIL' => $request->input('email'),
            'MESSAGE' => $request->input('message'),
            'CREATED_AT' => now(),
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
