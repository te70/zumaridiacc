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
        Schema::create('play_stations', function (Blueprint $table) {
            $table->id();
            $table->string('games_played');
            $table->string('soda_sold');
            $table->string('sweets_sold');
            $table->string('cash');
            $table->string('expenses');
            $table->string('net_cash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('play_stations');
    }
};
