<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_data_transaksi',
        'nama_barang',
        'kategori_barang',
        'quantity',
        'keterangan',
        'harga',
        'date',
        'updated_at',
        'created_at',
    ];
    protected $table = 'inputdata';
}
