<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(2)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test2@example.com',
            'password' => '123456',
            'role' => 'pengelola_gudang',
        ]);
    }
}
