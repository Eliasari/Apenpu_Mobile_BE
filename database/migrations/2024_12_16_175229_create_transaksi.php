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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('Transaksi_ID', 10)->primary(); // Primary key untuk Transaksi_ID
            $table->date('Tanggal_Transaksi'); // Tanggal transaksi
            $table->string('Customer_ID', 10)->nullable(); // Nullable jika bisa kosong
            $table->string('Karyawan_ID', 10)->nullable(); // Nullable jika bisa kosong
            $table->timestamps(); // Menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
