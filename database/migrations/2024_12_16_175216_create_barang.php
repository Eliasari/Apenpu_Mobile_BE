<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('Barang_ID', 10)->primary(); // Primary key untuk Barang_ID
            $table->string('Nama_Barang', 100);
            $table->string('Jenis_ID', 10)->nullable(); // Nullable jika bisa kosong
            $table->integer('Harga'); // Harga sebagai integer
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
