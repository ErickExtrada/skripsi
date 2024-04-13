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
        Schema::create('truck', function (Blueprint $table) {
            $table->id();
            $table->string('id_operator')->unique();
            $table->string('jenis_truck');
            $table->string('nomor_polisi');
            $table->integer('tahun_kendaraan');
            $table->string('operator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck');
    }
};
