<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'nama_barang';

    public function Barang()
    {
        return $this->belongsTo(kategori::class, 'kode_barang', 'kode_barang');
    }
}

