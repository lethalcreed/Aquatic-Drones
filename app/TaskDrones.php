<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskDrones extends Model
{
    protected $table = 'task_drones';
    protected $fillable = ['tasks_id', 'drones_id'];
}