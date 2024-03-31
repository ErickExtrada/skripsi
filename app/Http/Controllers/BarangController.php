<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        // return view('welcome', [
        //     'kategori' => kategori::all()
        // ]);
    }
    public function getProductsByCategory($kode_barang)
    {
        $products = Barang::where('kode_barang', $kode_barang)->get();
        return response()->json($products);
    }

    public function getPriceById($nama_barang)
    {
        $data = Barang::where('nama_barang', $nama_barang)->get();
        return response()->json($data);
    }
    // public function countItemsByCategory($kodeBarangFromCategory)
    // {
    //     $itemsCount = DB::table('nama_barang')
    //         ->where('kode_barang', $kodeBarangFromCategory)
    //         ->count();

    //     // You can now return this count to a view, or as a JSON response
    //     // For example, as a JSON response:
    //     return response()->json(['count' => $itemsCount]);
    // }
}
