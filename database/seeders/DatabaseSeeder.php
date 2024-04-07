<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\kategori;
use App\Models\Barang;
use DateTime;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->dataUser();
        $this->dataCategory();
        $this->dataBarang();
    }

    private function dataUser(): void
    {
        $userData = [
            [
                'name' => 'Pengelola Gudang 1',
                'email' => 'gudang@gmail.com',
                'role' => 'pengelola_gudang',
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Administrator 1',
                'email' => 'admin@gmail.com',
                'role' => 'administrator',
                'password' => bcrypt('123456')
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }

    private function dataCategory(): void
    {
        $kategori = [
            [
                'kategori_barang' => 'Aqua',
                'kode_barang' => 'AQ',
            ],
            [
                'kategori_barang' => 'Mizone',
                'kode_barang' => 'MZ',
            ],
            [
                'kategori_barang' => 'Vit',
                'kode_barang' => 'VT',
            ],
        ];

        foreach ($kategori as $key => $val) {
            kategori::create($val);
        }
    }

    private function dataBarang(): void
    {
        $items = [
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Aqua 19Liter',
                'kode_barang' => 'AQ',
                'quantity' => 10,
                'harga' => 49_000,
                'keterangan' => 'Stock Dari Gudang A',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Aqua 1500ML (12)',
                'kode_barang' => 'AQ',
                'quantity' => 50,
                'harga' => 62_000,
                'keterangan' => 'Stock Dari Gudang B',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Aqua 600ML(24)',
                'kode_barang' => 'AQ',
                'quantity' => 90,
                'harga' => 54_950,
                'keterangan' => 'Stock Dari Gudang D',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Aqua 330ML(24)',
                'kode_barang' => 'AQ',
                'quantity' => 150,
                'harga' => 40_000,
                'keterangan' => 'Stock Dari Gudang B',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Aqua 220ML(48)',
                'kode_barang' => 'AQ',
                'quantity' => 200,
                'harga' => 40_000,
                'keterangan' => 'Stock Dari Gudang F',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Mizone Cherry Blossom (12)',
                'kode_barang' => 'MZ',
                'quantity' => 400,
                'harga' => 45_000,
                'keterangan' => 'Stock Dari Gudang G',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Mizone Cranberry (12)',
                'kode_barang' => 'MZ',
                'quantity' => 300,
                'harga' => 45_000,
                'keterangan' => 'Stock Dari Gudang H',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Mizone Lchyee Lemon (12)',
                'kode_barang' => 'MZ',
                'quantity' => 20,
                'harga' => 45_000,
                'keterangan' => 'Stock Dari Gudang J',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Mizone Starfruit (12)',
                'kode_barang' => 'MZ',
                'quantity' => 8,
                'harga' => 45_000,
                'keterangan' => 'Stock Dari Gudang K',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Vit 19Liter',
                'kode_barang' => 'VT',
                'quantity' => 15,
                'harga' => 45_000,
                'keterangan' => 'Stock Dari Gudang L',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Vit 1500ML(12)',
                'kode_barang' => 'VT',
                'quantity' => 80,
                'harga' => 44_000,
                'keterangan' => 'Stock Dari Gudang M',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Vit 600ML(24)',
                'kode_barang' => 'VT',
                'quantity' => 100,
                'harga' => 43_000,
                'keterangan' => 'Stock Dari Gudang O',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Vit 330 ML(24)',
                'kode_barang' => 'VT',
                'quantity' => 10,
                'harga' => 35_000,
                'keterangan' => 'Stock Dari Gudang R',
                'date' => new DateTime()
            ],
            [
                'id_barang' => uniqid(),
                'nama_barang' => 'Vit 220ML(48)',
                'kode_barang' => 'VT',
                'quantity' => 120,
                'harga' => 30_000,
                'keterangan' => 'Stock Dari Gudang X',
                'date' => new DateTime()
            ],
        ];

        foreach ($items as $key => $val) {
            Barang::create($val);
        }
    }
}
