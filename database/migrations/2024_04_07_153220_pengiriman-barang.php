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
            $table->string('pengiriman_id');
            $table->string('items');
            $table->string('total_harga');
            // $table->string('quantity');
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
