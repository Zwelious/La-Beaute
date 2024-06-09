<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminTransController extends Controller
{
    public function AdminTrans()
    {
        $admin = session('admin');

        if (!$admin) {
            return redirect()->route('login')->with('error', "Session timed out. Log in again.");
        }

        $allTransactions = DB::table('TRANSAKSI')
        ->select('ID_TRANS', 'ID_CUST', 'TANGGAL', 'TOTAL', 'STATUS_DEL')
        ->where('TOTAL', '>', 0)
        ->get();

        $transactions = DB::table('TRANSAKSI')
        ->select('ID_TRANS', 'ID_CUST', 'TANGGAL', 'TOTAL', 'STATUS_DEL')
        ->where('TOTAL', '>', 0)
        ->paginate(15);

        $detailTransactions = DB::table('DETAIL_TRANSAKSI')
        ->select('ID_TRANS', 'ID_PROD', 'HARGA', 'QTY', 'STATUS_DEL')
        ->get();

        $productSales = DB::table('ProductSales')->get();

        return view('admin-dashboard', compact('allTransactions', 'transactions', 'detailTransactions', 'productSales'));
    }
}
