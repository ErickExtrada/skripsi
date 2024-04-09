<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\PengirimanBarang;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = PengirimanBarang::where('id', 'ike', "%$katakunci%")
                ->orWhere('pengiriman_id', 'like', "%$katakunci%")
                ->orWhere('total_harga', 'like', "%$katakunci%")
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
            return view('admin.pengiriman.list')->with('data', $data);
        }
        $data = PengirimanBarang::orderby('id', 'desc')->paginate($jumlahbaris);
        return view('admin.pengiriman.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trucks = Truck::all();
        $items = Data::all();
        return view('admin.pengiriman.create', compact('trucks', 'items'));
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
        Session::flash('items', $request->items);
        Session::flash('harga', $request->harga);
        // Session::flash('quantity', $request->quantity);
        Session::flash('kategori_operator', $request->kategori_operator);
        Session::flash('status', $request->status);
        Session::flash('date', $request->date);

        $request->validate([
            'items' => 'required',
            'harga' => 'required',
            // 'quantity' => 'required',
            'kategori_operator' => 'required',
            'status' => 'required',
            'date' => 'required',
        ], [
            'items.required' => 'item barang pengiriman mohon di isi',
            'harga.required' => 'total harga pengiriman mohon di isi',
            // 'quantity.required' => 'quantity mohon di isi',
            'kategori_operator.required' => 'operator mohon di isi',
            'status.required' => 'status mohon di isi',
            'date.required' => 'date mohon di isi',
        ]);

        $data = [
            'pengiriman_id' => uniqid(),
            'items' => $request->items,
            'total_harga' => $this->formatPriceToNumber($request->harga),
            // 'quantity' => 'Test 123',
            'status' => $request->status,
            'operator' => $request->kategori_operator,
            'date' => $request->date,
        ];
        PengirimanBarang::create($data);
        return redirect()->to('admin-pengiriman')->with('success', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     */
    public function show(PengirimanBarang $pengirimanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengirimanBarang $pengirimanBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengirimanBarang $pengirimanBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengirimanBarang $pengirimanBarang)
    {
        //
    }
}
