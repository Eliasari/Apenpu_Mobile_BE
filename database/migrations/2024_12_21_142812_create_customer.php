<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->id('Customer_ID'); // Primary key dan auto-increment
            $table->string('nama_customer', 100)->nullable(); // Nama customer
            $table->string('email', 50)->unique(); // Username dengan unique constraint
            $table->string('password', 255); // Password
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
