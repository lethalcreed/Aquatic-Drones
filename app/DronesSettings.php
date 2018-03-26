<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DronesSettings extends Model
{
    protected $table = 'drones_settings';
    protected $fillable = ['wind_speed', 'operation_time_start', 'operation_time_end', 'wave_height', 'ship_limit', 'water_level', 'water_temperature', 'water_current', 'sun_intensity'];
}
