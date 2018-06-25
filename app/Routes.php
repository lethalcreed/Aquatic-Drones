<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    protected $table = 'routes';
    protected $fillable = ['name'];

    public function anchorpoints()
    {
        return $this->hasMany('App\RoutesAnchorpoints', 'routes_id');
    }
}
