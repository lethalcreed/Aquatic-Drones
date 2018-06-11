<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DronesTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drones_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->longText('description');
            $table->enum('priority', ['High', 'Medium', 'Low']);
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('routes_id');
            $table->integer('drones_id');
            $table->integer('customers_id');
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
        Schema::dropIfExists('drones_tasks');
    }
}
