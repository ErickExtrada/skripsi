<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inputdata', function (Blueprint $table) {
            $table->id();
            $table->string('id_data_transaksi')->unique();
            $table->string('nama_barang');
            $table->string('kategori_barang');
            $table->integer('quantity');
            $table->text('keterangan');
            $table->decimal('harga', 10, 2);;
            $table->date('date');
            $table->date('updated_at');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inputdata');
    }
};
