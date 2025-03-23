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
        //rename the table
        // Schema::rename('gaadi_no','gaadiNo');
        
        //modify the column
        // Schema::table('gaadino',function(Blueprint $table){
        //     $table->string('name',50)->change();
        // });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
