<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $truck = Truck::where('id_truck', 'like', "%$katakunci%")
                ->orWhere('jenis_truck', 'like', "%$katakunci%")
                ->orWhere('nomor_polisi', 'like', "%$katakunci%")
                ->orWhere('tahun_kendaraan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
            return view('Sidebar.admintruck')->with('truck', $truck);
        }
        $truck = Truck::orderby('id_truck', 'desc')->paginate($jumlahbaris);
        return view('Sidebar.admintruck')->with('truck', $truck);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fungsi.createtruck');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('jenistruck', $request->jenistruck);
        Session::flash('nomorpolisi', $request->nomorpolisi);
        Session::flash('tahunkendaraan', $request->tahunkendaraan);
        Session::flash('operator', $request->operator);

        $request->validate([
            'jenistruck' => 'required',
            'nomorpolisi' => 'required',
            'tahunkendaraan' => 'required',
            'operator' => 'required',
        ], [
            'jenistruck.required' => 'jenis truck mohon di isi',
            'nomorpolisi.required' => 'nomor polisi mohon di isi',
            'tahunkendaraan.required' => 'tahun kendaraan mohon di isi',
            'operator.required' => 'operator mohon di isi',
        ]);
        $truck = [
            'operator_id' => uniqid(),
            'jenis_truck' => $request->jenistruck,
            'nomor_polisi' => $request->nomorpolisi,
            'tahun_kendaraan' => $request->tahunkendaraan,
            'operator' => $request->operator,
        ];
        Truck::create($truck);
        return redirect()->to('admintruck')->with('success', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        $truck = Truck::where('id_truck', $truck)->first();
        return view('fungsi.edit')->with('truck', $truck);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'jenistruck' => 'required',
            'nomorpolisi' => 'required',
            'tahunkendaraan' => 'required',
            'operator' => 'required',
        ], [
            'jenistruck.required' => 'jenis truck mohon di isi',
            'nomorpolisi.required' => 'nomor polisi mohon di isi',
            'tahunkendaraan.required' => 'tahun kendaraan mohon di isi',
            'operator.required' => 'operator mohon di isi',
        ]);
        $truck = [
            'jenis_truck' => $request->jenistruck,
            'nomor_polisi' => $request->nomorpolisi,
            'tahun_kendaraan' => $request->tahunkendaraan,
            'operator' => $request->operator,
        ];
        Truck::where('id_truck', $truck)->update($truck);
        return redirect()->to('admintruck')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $truck)
    {
        Truck::where('id_truck', $truck)->delete();
        return redirect()->to('admintruck')->with('success', 'Data berhasil di hapus');
    }
}
