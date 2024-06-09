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
        $dataProducts = DB::table('DETAIL_PRODUK as dp')
                ->join(DB::raw('(SELECT NAMA_PROD, MIN(ID_PROD) as min_id FROM DETAIL_PRODUK GROUP BY NAMA_PROD) as distinct_names'),
                    'dp.ID_PROD', '=', 'distinct_names.min_id')
                ->select('dp.ID_PROD', 'dp.NAMA_PROD', 'dp.SHADE', 'dp.DESKRIPSI', 'dp.HARGA', 'dp.DISKON', 'dp.KATEGORI', 'dp.STOCK', 'dp.FOTO_PROD')
                ->paginate(9);

        $allProducts = DB::table('detail_produk')->get();

        return view('shop', compact('dataProducts', 'allProducts'));
    }

    public function getProductById($id_prod)
    {
        return $this->dataProducts->firstWhere('ID_PROD', $id_prod);
    }

    public function shopSearch(Request $request)
    {
        $query = $request->input('searchQuery');

        if ($query != '') {
            $dataProducts = DB::table('DETAIL_PRODUK as dp')
            ->join(DB::raw('(SELECT NAMA_PROD, MIN(ID_PROD) as min_id FROM DETAIL_PRODUK GROUP BY NAMA_PROD) as distinct_names'),
                'dp.ID_PROD', '=', 'distinct_names.min_id')
            ->select('dp.ID_PROD', 'dp.NAMA_PROD', 'dp.SHADE', 'dp.DESKRIPSI', 'dp.HARGA', 'dp.DISKON', 'dp.KATEGORI', 'dp.STOCK', 'dp.FOTO_PROD')
            ->where('dp.NAMA_PROD', 'LIKE', "%{$query}%")
            ->orWhere('dp.DESKRIPSI', 'LIKE', "%{$query}%")
            ->paginate(9);

        }
        else{
            $dataProducts = DB::table('DETAIL_PRODUK as dp')
                ->join(DB::raw('(SELECT NAMA_PROD, MIN(ID_PROD) as min_id FROM DETAIL_PRODUK GROUP BY NAMA_PROD) as distinct_names'),
                    'dp.ID_PROD', '=', 'distinct_names.min_id')
                ->select('dp.ID_PROD', 'dp.NAMA_PROD', 'dp.SHADE', 'dp.DESKRIPSI', 'dp.HARGA', 'dp.DISKON', 'dp.KATEGORI', 'dp.STOCK', 'dp.FOTO_PROD')
                ->paginate(9);
        }

        return view('shop', compact('dataProducts', 'query'));
    }
    public function showByCategory($category)
    {
        $allProducts = DB::table('detail_produk')->get();
        $dataProducts = DB::table('detail_produk')
            ->where('KATEGORI', $category)
            ->paginate(9);

        return view('shop', compact('allProducts', 'dataProducts', 'category'));
    }
}

