<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\kategori;
use App\Models\Barang;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Pengelola Gudang 1',
                'email'=>'pengelolagudang@gmail.com',
                'role'=>'pengelola_gudang',
                'password'=>bcrypt('12345678')
            ],
            [
                'name'=>'Administrator 1',
                'email'=>'administrator1@gmail.com',
                'role'=>'administrator',
                'password'=>bcrypt('123456')
            ],
        ];

        foreach($userData as $key =>$val){
            User::create($val);
        }

        $kategori = [
            [
                'kategori_barang'=>'Aqua',
                'kode_barang'=>'AQ',
            ],
            [
                'kategori_barang'=>'Mizone',
                'kode_barang'=>'MZ',
            ],
            [
                'kategori_barang'=>'Vit',
                'kode_barang'=>'VT',
            ],
        ];

        foreach($kategori as $key =>$val){
            kategori::create($val);
        }

        $items = [
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Aqua 19Liter',
                'kode_barang' => 'AQ',
                'harga' => 49_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Aqua 1500ML (12)',
                'kode_barang' => 'AQ',
                'harga' => 62_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Aqua 600ML(24)',
                'kode_barang' => 'AQ',
                'harga' => 54_950,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Aqua 330ML(24)',
                'kode_barang' => 'AQ',
                'harga' => 40_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Aqua 220ML(48)',
                'kode_barang' => 'AQ',
                'harga' => 40_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Mizone Cherry Blossom (12)',
                'kode_barang' => 'MZ',
                'harga' => 45_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Mizone Cranberry (12)',
                'kode_barang' => 'MZ',
                'harga' => 45_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Mizone Lchyee Lemon (12)',
                'kode_barang' => 'MZ',
                'harga' => 45_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Mizone Starfruit (12)',
                'kode_barang' => 'MZ',
                'harga' => 45_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Vit 19Liter',
                'kode_barang' => 'VT',
                'harga' => 45_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Vit 1500ML(12)',
                'kode_barang' => 'VI1',
                'harga' => 44_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Vit 600ML(24)',
                'kode_barang' => 'VT',
                'harga' => 43_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Vit 330 ML(24)',
                'kode_barang' => 'VT',
                'harga' => 35_000,
            ],
            [
                'id_barang' => Str::uuid()->toString(),
                'nama_barang' => 'Vit 220ML(48)',
                'kode_barang' => 'VT',
                'harga' => 30_000,
            ],
        ];


        foreach($items as $key =>$val){
            Barang::create($val);
        }
    }
}
