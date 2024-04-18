<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class Dynamicdependent extends Controller
{
    function index()
    {
        $kategori_barang = kategori::table('kategoribarang')->groupBy('kategori')->get();
        return redirect()->to('transaksi')->with('success', 'Data berhasil di input', $kategori_barang);
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = kategori::table('kategoribarang')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();

        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }
}
