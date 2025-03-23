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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullabel();
            $table->string('address')->nullabel();
            $table->string('phone')->nullabel();
            $table->string('gaadino')->nullabel();
            $table->string('aadharno')->nullabel();
            $table->string('image')->nullabel();
            $table->string('license')->nullabel();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
