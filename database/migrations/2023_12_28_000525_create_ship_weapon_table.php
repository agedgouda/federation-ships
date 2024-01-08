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
        Schema::create('ship_weapon', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('arc');
            $table->string('location');
            $table->foreignId('ship_id')->constrained();
            $table->foreignId('weapon_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ship_weapon');
    }
};
