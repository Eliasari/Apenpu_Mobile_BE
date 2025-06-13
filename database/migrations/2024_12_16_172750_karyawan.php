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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->string('Karyawan_ID', 10)->primary(); // Kolom Karyawan_ID sebagai primary key
            $table->string('Nama_Karyawan', 100); // Kolom Nama_Karyawan
            $table->char('Gender', 1); // Kolom Gender, tipe char dengan panjang 1 karakter
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
