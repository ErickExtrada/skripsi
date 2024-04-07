<?php

namespace App\Http\Controllers;

use App\Models\PengirimanBarang;
use Illuminate\Http\Request;

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
            return view('admin.pengiriman.list')->with('data', $data);;
        }
        $data = PengirimanBarang::orderby('id', 'desc')->paginate($jumlahbaris);
        return view('admin.pengiriman.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
