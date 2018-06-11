<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DronesTasks extends Model
{
    protected $table = 'drones_tasks';
    protected $fillable = ['name', 'description', 'priority', 'start_time', 'end_time'];

    public function customers()
    {
        return $this->hasOne('Customer', 'id', 'customers_id');
    }
}
