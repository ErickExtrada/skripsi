<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Data;
use App\Models\kategori;
use Barryvdh\Debugbar\Facades\Debugbar;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('admin.transaksi.create', compact('kategori'));
    }

    private function formatPriceToNumber($hargaString)
    {
        // Remove commas from the price string
        $hargaStringWithoutCommas = str_replace(',', '', $hargaString);

        // Remove any non-numeric characters except for dots (for decimal numbers)
        $cleanedPriceString = preg_replace('/[^0-9.]/', '', $hargaStringWithoutCommas);

        // Convert the string to a numeric value
        return (float) $cleanedPriceString;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_barang', $request->nama_barang);
        Session::flash('kategori_barang', $request->kategori_barang);
        Session::flash('quantity', $request->quantity);
        Session::flash('harga', $request->harga);

        $request->validate([
            'nama_barang' => 'required',
            'kategori_barang' => 'required',
            'quantity' => 'required',
            'harga' => 'required',
            'date' => 'required',
        ], [
            'nama_barang.required' => 'nama barang mohon di isi',
            'kategori_barang.required' => 'kategori barang mohon di isi',
            'quantity.required' => 'quantity mohon di isi',
            'harga.required' => 'harga mohon di isi',
        ]);
        $date = new DateTime($request->date);
        $hargaStr = $request->harga;
        $idBarang = $request->nama_barang;
        $dataBarang = Barang::where('id_barang', $idBarang)->first();
        if ($dataBarang->quantity == 0) {
            return redirect()->to('transaksi')->with('warning', 'Data barang sisa 0');
        }

        if ($request->quantity < 30) {
            return redirect()->to('transaksi')->with('warning', 'Isi quantity  minimal 30');
        }

        $calculateQuntity = $dataBarang->quantity - $request->quantity;
        if ($calculateQuntity <= 0) {
            return redirect()->to('transaksi')->with('warning', 'Data barang hanya sisa ' . $dataBarang->quantity);
        }
        Barang::where('id_barang', $idBarang)->update(['quantity' => $calculateQuntity]);
        $data = [
            'id_data_transaksi' => uniqid(),
            'nama_barang' => $dataBarang->nama_barang,
            'kategori_barang' => $request->kategori_barang,
            'quantity' => $request->quantity,
            'keterangan' => $request->keterangan,
            'harga' =>  $this->formatPriceToNumber($hargaStr),
            'date' => $date,
        ];
        Data::create($data);
        return redirect()->to('transaksi')->with('success', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Data::where('id', $id)->first();
        return view('admin.transaksi.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namabarang' => 'required',
            'kategoribarang' => 'required',
            'quantity' => 'required',
            'harga' => 'required',
            'date' => 'required',
        ], [
            'namabarang.required' => 'nama barang mohon di isi',
            'kategoribarang.required' => 'kategori barang mohon di isi',
            'quantity.required' => 'quantity mohon di isi',
            'harga.required' => 'harga mohon di isi',
        ]);
        $data = [
            'id_data_transaksi' => uniqid(),
            'nama_barang' => $request->namabarang,
            'kategori_barang' => $request->kategoribarang,
            'quantity' => $request->quantity,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'date' => $request->date,
        ];
        Data::where('id', $id)->update($data);
        return redirect()->to('transaksi')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Data::where('id', $id)->delete();
        return redirect()->to('transaksi')->with('success', 'Data berhasil di hapus');
    }
}
