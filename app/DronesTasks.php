<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DronesTasks extends Model
{
    protected $table = 'drones_tasks';
    protected $fillable = ['name', 'description', 'priority', 'start_date', 'start_time', 'end_date', 'end_time'];
}
