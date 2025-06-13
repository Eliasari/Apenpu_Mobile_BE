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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->string('Transaksi_ID', 10); // Kolom Transaksi_ID
            $table->string('Barang_ID', 10); // Kolom Barang_ID
            $table->integer('Jumlah'); // Kolom Jumlah
            $table->integer('Stok'); // Kolom Stok
            $table->integer('Total'); // Kolom Total
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key jika ada relasi
            $table->foreign('Transaksi_ID')->references('Transaksi_ID')->on('transaksi');
            $table->foreign('Barang_ID')->references('Barang_ID')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
