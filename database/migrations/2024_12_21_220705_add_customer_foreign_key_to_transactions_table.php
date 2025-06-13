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
        Schema::table('transactions', function (Blueprint $table) {
            // Menambahkan foreign key constraint pada customer_id
            $table->foreign('customer_id')
                ->references('Customer_ID')->on('customer')  // Menyambungkan ke tabel customer
                ->onDelete('cascade');  // Menentukan aksi ketika data customer dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
        });
    }
};
