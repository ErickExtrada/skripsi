<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori_barang';

    public function namaBarangs()
    {
        return $this->hasMany(Barang::class, 'kategori_barang', 'kode_barang');
    }
}
