<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 'pengelola_gudang') {
            return redirect()->to('/pengelola-gudang')->with('warning', 'Forbidden');
        }
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = Data::where('id', 'ike', "%$katakunci%")
                ->orWhere('nama_barang', 'like', "%$katakunci%")
                ->orWhere('kategori_barang', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
            return view('admin.transaksi.list')->with('data', $data);
        }
        $data = Data::orderby('id', 'desc')->paginate($jumlahbaris);
        return view('admin.transaksi.list')->with('data', $data);
    }

    public function pengelolaGudang()
    {
        return view('gudang.dashboard');
    }
}
