<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        $dataProducts = DB::table('detail_produk')
        ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'DESKRIPSI', 'HARGA', 'DISKON', 'KATEGORI', 'STOCK', 'FOTO_PROD')
        ->get();
        return view('index', compact('dataProducts'));
    }
}
