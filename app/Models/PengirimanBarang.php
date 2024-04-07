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
        'total_harga',
        'operator',
        'status',
        'updated_at',
        'created_at',
    ];
}
