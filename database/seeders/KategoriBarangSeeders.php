<?php

namespace Database\Seeders;

use App\Models\kategori;
use App\Models\KategoriBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriBarangSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'kategori'=>'Aqua',
            ],
            [
                'kategori'=>'Mizone',
            ],
            [
                'kategori'=>'Vit',
            ],
        ];

        foreach($kategori as $key =>$val){
            kategori::create($val);
        }
    }
}
