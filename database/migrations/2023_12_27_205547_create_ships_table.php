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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('ship_image_url')->nullable();
            $table->string('class');
            $table->integer('power');
            $table->integer('aux');
            $table->integer('battery');
            $table->integer('bridge');
            $table->integer('c_hull')->nullable();
            $table->integer('l_hull')->nullable();
            $table->integer('r_hull')->nullable();
            $table->integer('f_hull');
            $table->integer('c_warp')->nullable();
            $table->integer('l_warp');
            $table->integer('r_warp');
            $table->integer('shield_1')->nullable();
            $table->integer('shield_2')->nullable();
            $table->integer('shield_3')->nullable();
            $table->integer('shield_4')->nullable();
            $table->integer('impulse_engine')->nullable();
            $table->integer('lab')->nullable();
            $table->integer('drone_rack')->nullable();
            $table->integer('emergency_bridge')->nullable();
            $table->integer('power_reactor')->nullable();
            $table->integer('frame_damage')->nullable();
            $table->integer('transporter')->nullable();
            $table->integer('tractor_beam')->nullable();
            $table->integer('impulse')->nullable();
            $table->integer('anti_drone')->nullable();
            $table->string('turn_mode')->nullable();
            $table->integer('base_8_turn_mode');
            $table->integer('base_8_turn_cost');
            $table->integer('base_16_turn_mode');
            $table->integer('base_16_turn_cost');
            $table->integer('base_24_turn_mode');
            $table->integer('base_24_turn_cost');
            $table->float('acceleration_cost', 2, 1);
            $table->float('deceleration_cost', 2, 1);
            $table->foreignId('faction_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
