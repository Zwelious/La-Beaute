<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTransController extends Controller
{
    public function AdminTrans()
    {
        return view('admin-dashboard');
    }
}
