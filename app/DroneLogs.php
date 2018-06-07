<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DroneLogs extends Model
{
    protected $table = 'drones_log';
    protected $fillable = ['drones_id', 'drones_tasks_id', 'message', 'status'];
}
