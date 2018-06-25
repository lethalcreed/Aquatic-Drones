<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drones extends Model
{
    protected $table = 'drones';
    protected $fillable = ['name', 'status'];
}
