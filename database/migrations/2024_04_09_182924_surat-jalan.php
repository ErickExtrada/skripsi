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
        Schema::create('surat-jalan', function (Blueprint $table) {
            $table->id();
            $table->string('id_surat_jalan')->unique();
            $table->string('name_client');
            $table->string('nama_barang');
            $table->string('pickup_address');
            $table->string('destination_address');
            $table->string('kategori_barang');
            $table->string('operator');
            $table->string('tracking');
            $table->string('harga_barang');
            $table->string('harga_pengiriman');
            $table->string('quantity');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat-jalan');
    }
};
