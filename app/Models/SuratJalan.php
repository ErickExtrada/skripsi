<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_surat_jalan',
        'name_client',
        'nama_barang',
        'pickup_address',
        'destination_address',
        'kategori_barang',
        'operator',
        'tracking',
        'harga_barang',
        'harga_pengiriman',
        'quantity',
        'date',
        'updated_at',
        'created_at',
    ];
    protected $table = 'surat-jalan';
}
