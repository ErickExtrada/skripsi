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
            $table->id('id_surat_jalan');
            $table->string('name');
            $table->date('date');
            $table->string('pickup_address');
            $table->string('destination_address');
            $table->string('nama_barang');
            $table->string('kategori_barang');
            $table->string('operator');
            $table->string('tracking');
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
