<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    public function Barang()
    {
        return $this->belongsTo(kategori::class, 'nama_barang', 'kode_barang', 'harga');
    }
}

