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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('sphoto');
            $table->string('owphoto');
            $table->string('ow_name');
            $table->string('ad_photo');
            $table->string('ad_name');
            $table->string('heading');
            $table->text('about');
            $table->string('instaid');
            $table->string('facebookid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
