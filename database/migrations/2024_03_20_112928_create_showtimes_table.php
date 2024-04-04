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
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('theatre_id')->constrained()->onDelete('cascade');
            $table->foreignId('show_id')->constrained()->onDelete('cascade');;
            $table->time('time');
            $table->date('date');
            $table->boolean('is_disabled')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
