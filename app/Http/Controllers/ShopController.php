<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public $dataProducts;

    public function __construct()
    {
        $this->dataProducts = DB::table('DETAIL_PRODUK')
            ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'DESKRIPSI', 'HARGA', 'DISKON', 'KATEGORI', 'STOCK', 'FOTO_PROD')
            ->get();
    }

    public function Shop()
    {
        $dataProducts = DB::table('DETAIL_PRODUK')
            ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'DESKRIPSI', 'HARGA', 'DISKON', 'KATEGORI', 'STOCK', 'FOTO_PROD')
            ->paginate(9);

        return view('shop', compact('dataProducts'));
    }

    public function getProductById($id_prod)
    {
        return $this->dataProducts->firstWhere('ID_PROD', $id_prod);
    }

    public function shopSearch(Request $request)
    {
        $query = $request->input('searchQuery');

        if ($query != '') {
            $dataProducts = DB::table('DETAIL_PRODUK')
                ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'DESKRIPSI', 'HARGA', 'DISKON', 'KATEGORI', 'STOCK', 'FOTO_PROD')
                ->where('NAMA_PROD', 'LIKE', "%{$query}%")
                ->orWhere('DESKRIPSI', 'LIKE', "%{$query}%")
                ->paginate(9);
        }
        else{
            $dataProducts = DB::table('DETAIL_PRODUK')
            ->select('ID_PROD', 'NAMA_PROD', 'SHADE', 'DESKRIPSI', 'HARGA', 'DISKON', 'KATEGORI', 'STOCK', 'FOTO_PROD')
            ->paginate(9);
        }

        return view('shop', compact('dataProducts', 'query'));
    }
}

