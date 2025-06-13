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
        Schema::create('message', function (Blueprint $table) {
            $table->id();

            // Polymorphic sender (User or Customer)
            $table->unsignedBigInteger('sender_id');
            $table->string('sender_type');

            // Polymorphic receiver (User or Customer)
            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_type');

            $table->text('message'); // This will be encrypted in the model
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
