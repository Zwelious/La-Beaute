<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function Receipt()
    {
        return view('receipt');
    }
}
