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
        Schema::create('wines', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('open');
            $table->string('add');
            $table->string('total');
            $table->string('close');
            $table->string('difference');
            $table->string('price');
            $table->string('total_amount');
            $table->string('expenses');
            $table->string('gross_cash');
            $table->string('mpesa');
            $table->string('net_cash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wines');
    }
};
