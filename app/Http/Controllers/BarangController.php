<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Barang;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    private $pathRedirect = 'admin-barang';

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('admin.barang.create', compact('kategori'));
    }

    private function formatPriceToNumber($hargaString)
    {
        $hargaStringWithoutCommas = str_replace(',', '', $hargaString);

        // Convert the string to a numeric value
        return (float) $hargaStringWithoutCommas;
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
        $data = [
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kategori_barang,
            'quantity' => $request->quantity,
            'keterangan' => $request->keterangan,
            'harga' =>  $this->formatPriceToNumber($hargaStr),
            'date' => $date,
        ];
        Barang::create($data);
        return redirect()->to($this->pathRedirect)->with('success', 'Data berhasil di input');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Barang::where('id', $id)->first();
        return view('admin.barang.edit')->with('data', $data);
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
            'nama_barang' => $request->namabarang,
            'kode_barang' => $request->kategoribarang,
            'quantity' => $request->quantity,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'date' => $request->date,
        ];
        Barang::where('id', $id)->update($data);
        return redirect()->to($this->pathRedirect)->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::where('id', $id)->delete();
        return redirect()->to($this->pathRedirect)->with('success', 'Data berhasil di hapus');
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
