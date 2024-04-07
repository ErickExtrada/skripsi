<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = Barang::where('id', 'ike', "%$katakunci%")
                ->orWhere('nama_barang', 'like', "%$katakunci%")
                ->orWhere('kategori_barang', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
            return view('adminDash')->with('data', $data);
        }
        $data = Barang::orderby('id', 'desc')->paginate($jumlahbaris);
        return view('adminDash')->with('data', $data);
    }

    public function pengelolagudang()
    {
        return view('dashboard');
    }
}
