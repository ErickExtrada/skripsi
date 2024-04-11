<?php

namespace App\Http\Controllers;

use App\Models\SuratJalan;
use Illuminate\Http\Request;

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
        return view('admin.suratjalan.list')->with('data', $data);
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
