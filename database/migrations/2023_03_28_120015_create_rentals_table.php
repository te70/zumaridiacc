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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('house_number')->nullable();
            $table->string('elec_prev')->nullable();
            $table->string('elec_curr')->nullable();
            $table->string('elec_consump')->nullable();
            $table->string('elec_total')->nullable();
            $table->string('water_prev')->nullable();
            $table->string('water_curr')->nullable();
            $table->string('water_consump')->nullable();
            $table->string('water_total')->nullable();
            $table->string('total_bills')->nullable();
            $table->string('total_due')->nullable();
            $table->string('rent')->nullable();
            $table->string('arrears')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
