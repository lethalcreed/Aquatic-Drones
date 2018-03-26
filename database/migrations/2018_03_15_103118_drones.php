<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drones_settings_id');
            $table->integer('harbor_id');
            $table->text('name');
            $table->enum('status', ['Idle', 'Error', 'Busy', 'Maintenance']);
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
        Schema::dropIfExists('drones');
    }
}
