<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanBarang extends Model
{
    use HasFactory;
    protected $table = 'pengiriman-barang';

    protected $fillable = [
        'pengiriman_id',
        'id_data_transaksi',
        'items',
        'total_harga',
        'pickup_address',
        'destination_address',
        'operator',
        'status',
        'date',
        'updated_at',
        'created_at',
    ];
}
