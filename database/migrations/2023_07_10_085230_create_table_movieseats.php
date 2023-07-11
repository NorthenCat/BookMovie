<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seats_movie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies_data');
            $table->integer('seat_id');
            $table->boolean('is_booked')->default(false);
            $table->foreignId('booked_by')->nullable()->constrained('users');
            $table->datetime('booked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats_movie');
    }
};