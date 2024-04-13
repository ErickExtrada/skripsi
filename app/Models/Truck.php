<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_operator',
        'jenis_truck',
        'nomor_polisi',
        'tahun_kendaraan',
        'operator',
        'updated_at',
        'created_at',
    ];
    protected $table = 'truck';
}
