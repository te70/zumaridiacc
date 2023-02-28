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
            $table->string('product_name')->nullable();
            $table->string('open')->nullable();
            $table->string('add')->nullable();
            $table->string('total')->nullable();
            $table->string('close')->nullable();
            $table->string('difference')->nullable();
            $table->string('price')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('expenses')->nullable();
            $table->string('gross_cash')->nullable();
            $table->string('mpesa')->nullable();
            $table->string('net_cash')->nullable();
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
