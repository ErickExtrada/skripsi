<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'kode_barang',
        'quantity',
        'harga',
        'keterangan',
        'date',
        'updated_at',
        'created_at',
    ];

    public function Barang()
    {
        return $this->belongsTo(
            kategori::class,
            'id_barang',
            'nama_barang',
            'kode_barang',
            'quantity',
            'harga',
            'keterangan',
            'date'
        );
    }
}
