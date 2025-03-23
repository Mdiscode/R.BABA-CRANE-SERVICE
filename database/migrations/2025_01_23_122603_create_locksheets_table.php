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
        Schema::create('locksheets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slipNo')->nullable();
            $table->string('date')->nullable();
            $table->string('inTime')->nullable();
            $table->string('outTime')->nullable();
            $table->string('totalTime')->nullable();
            $table->string('workdetail')->nullable();
            $table->string('companyname')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locksheets');
    }
};
