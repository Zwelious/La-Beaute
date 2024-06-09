<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

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

        $allTimeEarnings = DB::table('TRANSAKSI')
        ->sum('TOTAL');

        $startDate = Carbon::now()->subDays(30)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        // Sum the total earnings for the last 30 days
        $monthlyEarnings = DB::table('TRANSAKSI')
            ->where('TANGGAL', '>=', $startDate)
            ->where('TANGGAL', '<=', $endDate)
            ->where('TOTAL', '>', 0)
            ->sum('TOTAL');

        $detailTransactions = DB::table('DETAIL_TRANSAKSI')
        ->select('ID_TRANS', 'ID_PROD', 'HARGA', 'QTY', 'STATUS_DEL')
        ->get();

        $productSales = DB::table('ProductSales')
        ->paginate(10);

        $messages = DB::table('message')
        ->get();

        $messagesCount = DB::table('message')->count();

        return view('admin-dashboard', compact('allTransactions', 'transactions', 'detailTransactions', 'productSales', 'allTimeEarnings', 'monthlyEarnings', 'messagesCount'));
    }

    public function AdminContact()
    {
        $admin = session('admin');

        if (!$admin) {
            return redirect()->route('login')->with('error', "Session timed out. Log in again.");
        }

        $messages = DB::table('message')
        ->paginate(20);

        return view('admin-contact', compact('messages'));
    }

    public function AdminShop()
    {
        $admin = session('admin');

        if (!$admin) {
            return redirect()->route('login')->with('error', "Session timed out. Log in again.");
        }
        $products = DB::table('detail_produk')->get();

        return view('admin-shop', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'shade' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('product_images', 'public');

        DB::table('detail_produk')->insert([
            'NAMA_PROD' => $request->nama_produk,
            'FOTO_PROD' => $imagePath,
            'SHADE' => $shade,
            'DESKRIPSI' => $request->deskripsi,
            'HARGA' => $request->harga,
            'DISKON'=> $request->diskon,
            'STOCK'=> $request->stock,
        ]);

        return redirect()->route('AdminShop')->with('success', 'Product added successfully.');
    }

    public function editProduct(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'shade' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $product = DB::table('detail_produk')->where('produk_id', $request->produk_id)->first();

        if (!$product) {
            return redirect()->route('AdminShop')->with('error', 'Product not found.');
        }

        $updateData = [
            'NAMA_PROD' => $request->nama_produk,
            'FOTO_PROD' => $imagePath,
            'SHADE' => $shade,
            'DESKRIPSI' => $request->deskripsi,
            'HARGA' => $request->harga,
            'DISKON'=> $request->diskon,
            'STOCK'=> $request->stock,
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $updateData['image'] = $imagePath;
        }

        DB::table('detail_produk')->where('produk_id', $request->produk_id)->update($updateData);

        return redirect()->route('AdminShop')->with('success', 'Product updated successfully.');
    }
}
