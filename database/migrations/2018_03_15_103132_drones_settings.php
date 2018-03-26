<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DronesSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->double('wind_speed');
            $table->time('operation_time_start');
            $table->time('operation_time_end');
            $table->double('wave_height');
            $table->integer('ship_limit');
            $table->double('water_level');
            $table->double('water_current');
            $table->double('water_temperature');
            $table->double('sun_intensity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drones_settings');
    }
}
