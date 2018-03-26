<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harbor extends Model
{
   protected $table = 'harbor';
   protected $fillable = ['name', 'description', 'berth'];
}
