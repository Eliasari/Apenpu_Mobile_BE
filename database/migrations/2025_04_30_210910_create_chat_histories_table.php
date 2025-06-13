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
        Schema::create('chat_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Customer_ID'); // Sesuai dengan PK di tabel customer
            $table->text('message');
            $table->enum('sender', ['customer', 'bot']);
            $table->timestamps();

            // Relasi foreign key
            $table->foreign('Customer_ID')
                  ->references('Customer_ID')
                  ->on('customer')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat_histories', function (Blueprint $table) {
            $table->dropForeign(['Customer_ID']);
        });

        Schema::dropIfExists('chat_histories');
    }

};
