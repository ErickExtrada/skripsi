<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_surat_jalan',
        'name',
        'date',
        'pickup_address',
        'destination_address',
        'nama_barang',
        'kategori_barang',
        'operator',
        'tracking',
        'updated_at',
        'created_at',
    ];
    protected $table = 'surat-jalan';
}
