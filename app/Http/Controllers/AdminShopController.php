<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminShopController extends Controller
{
    public function AdminShop()
    {
        return view('admin-shop');
    }
}
