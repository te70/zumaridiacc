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
            $table->string('elec_prev')->default('0');
            $table->string('elec_curr')->default('0');
            $table->string('elec_consump')->default('0');
            $table->string('elec_total')->default('0');
            $table->string('water_prev')->default('0');
            $table->string('water_curr')->default('0');
            $table->string('water_consump')->default('0');
            $table->string('water_total')->default('0');
            $table->string('total_bills')->default('0');
            $table->string('total_due')->default('0');
            $table->string('rent')->default('0');
            $table->string('arrears')->default('0');
            $table->string('tenant_id')->nullable();
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
