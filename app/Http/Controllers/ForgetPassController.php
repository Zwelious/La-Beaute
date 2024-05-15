<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetPassController extends Controller
{
    public function ForgetPass()
    {
        return view('forget');
    }
}
