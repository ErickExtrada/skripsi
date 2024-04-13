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
        Schema::create('pengiriman-barang', function (Blueprint $table) {
            $table->id();
            $table->string('pengiriman_id')->unique();
            $table->string('id_data_transaksi');
            $table->string('items');
            $table->string('total_harga');
            $table->string('pickup_address');
            $table->string('destination_address');
            $table->string('operator');
            $table->string('status');
            $table->string('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman-barang');
    }
};
