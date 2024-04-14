<?php

namespace App\Http\Controllers;

use App\Models\SuratJalan;
use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\PengirimanBarang;
use App\Models\Truck;
use DateTime;
use Illuminate\Support\Facades\Auth;

class SuratJalanController extends Controller
{
    private $pathRedirect = 'surat-jalan';

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = SuratJalan::where('id', 'ike', "%$katakunci%")
                ->orWhere('pengiriman_id', 'like', "%$katakunci%")
                ->orWhere('total_harga', 'like', "%$katakunci%")
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
            return view('admin.pengiriman.list')->with('data', $data);
        }
        $data = SuratJalan::orderby('id', 'desc')->paginate($jumlahbaris);
        if (Auth::user()->role == 'administrator') {
            return view('admin.suratjalan.list')->with('data', $data);
        }

        return view('gudang.suratjalan.list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengirimanBarang = PengirimanBarang::whereIn('status', ['On-Progress Deliver', 'Delivered'])->get();
        return view('admin.suratjalan.create', compact('pengirimanBarang'));
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
        $request->validate([
            'name_client' => 'required',
            'tracking' => 'required',
            'date' => 'required',
        ], [
            'name_client.required' => 'nama client mohon di isi',
            'tracking.required' => 'tracking pengiriman barang mohon di isi',
            'date.required' => 'date mohon di isi',
        ]);

        $dataTracking = PengirimanBarang::where(
            'pengiriman_id',
            $request->tracking
        )->first();
        $dataTransaksi = Data::where(
            'id_data_transaksi',
            $dataTracking->id_data_transaksi
        )->first();

        $data = [
            'id_surat_jalan' => uniqid(),
            'name_client' => $request->name_client,
            'nama_barang' => $dataTransaksi->nama_barang,
            'pickup_address' => $dataTracking->pickup_address,
            'destination_address' => $dataTracking->destination_address,
            'kategori_barang' => $dataTransaksi->kategori_barang,
            'operator' => $dataTracking->operator,
            'tracking' => $dataTracking->status,
            'harga_barang' => $this->formatPriceToNumber($dataTransaksi->harga),
            'harga_pengiriman' => $this->formatPriceToNumber($dataTracking->total_harga),
            'quantity' => $dataTransaksi->quantity,
            'date' => $request->date,
        ];
        SuratJalan::create($data);
        return redirect()->to($this->pathRedirect)->with('success', 'Data berhasil di input');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengirimanBarang = PengirimanBarang::whereIn('status', ['On-Progress Deliver', 'Delivered'])->get();
        $suratJalan = SuratJalan::where('id', $id)->first();
        return view('admin.suratjalan.edit', compact('pengirimanBarang', 'suratJalan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name_client' => 'required',
            'tracking' => 'required',
            'date' => 'required',
        ], [
            'name_client.required' => 'nama client mohon di isi',
            'tracking.required' => 'tracking pengiriman barang mohon di isi',
            'date.required' => 'date mohon di isi',
        ]);

        $dataTracking = PengirimanBarang::where(
            'pengiriman_id',
            $request->tracking
        )->first();
        $dataTransaksi = Data::where(
            'id_data_transaksi',
            $dataTracking->id_data_transaksi
        )->first();

        $data = [
            'id_surat_jalan' => uniqid(),
            'name_client' => $request->name_client,
            'nama_barang' => $dataTransaksi->nama_barang,
            'pickup_address' => $dataTracking->pickup_address,
            'destination_address' => $dataTracking->destination_address,
            'kategori_barang' => $dataTransaksi->kategori_barang,
            'operator' => $dataTracking->operator,
            'tracking' => $dataTracking->status,
            'harga_barang' => $this->formatPriceToNumber($dataTransaksi->harga),
            'harga_pengiriman' => $this->formatPriceToNumber($dataTracking->total_harga),
            'quantity' => $dataTransaksi->quantity,
            'date' => $request->date,
        ];
        SuratJalan::where('id', $id)->update($data);
        return redirect()->to($this->pathRedirect)->with('success', 'Data berhasil di update');
    }

    public function detailPdf($id)
    {
        $suratJalan = SuratJalan::where('id', $id)->firstOrFail();
        $mpdf = new \Mpdf\Mpdf;

        $uniqueCode = $suratJalan->id_surat_jalan;
        $truck = Truck::where(
            'id_operator',
            $suratJalan->operator
        )->first();

        // Render view to HTML, pass the unique code to the view
        $html = view('admin.suratjalan.detail', compact('suratJalan', 'uniqueCode', 'truck'))->render();

        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        // Construct the PDF filename
        $pickupDateFormatted = (new DateTime($suratJalan->date))->format('Y-m-d');
        $customerName = str_replace([' ', '/'], '_', $suratJalan->name_client);
        $fileName = "Surat-Jalan-{$suratJalan->id_surat_jalan}-{$customerName}-{$pickupDateFormatted}.pdf";

        // Output PDF with dynamic filename
        $mpdf->Output($fileName, 'I');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Suratjalan::where('id', $id)->delete();
        return redirect()->to($this->pathRedirect)->with('success', 'Data berhasil di hapus');
    }
}
