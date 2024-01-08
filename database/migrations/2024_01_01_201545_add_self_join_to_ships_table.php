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
        Schema::table('ships', function (Blueprint $table) {
            $table->bigInteger('ship_class_id')->nullable();
            $table->renameColumn('class','type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ships', function (Blueprint $table) {
            //
        });
    }
};
