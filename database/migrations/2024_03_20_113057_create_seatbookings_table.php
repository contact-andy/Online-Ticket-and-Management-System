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
        Schema::create('seatbookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('reservation_id')->constrained();
            $table->foreignId('seat_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seatbookings');
    }
};
