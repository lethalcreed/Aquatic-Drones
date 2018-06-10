<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersToCustomers extends Model
{
    protected $table = 'customers_to_users';

    public function users()
    {
        return $this->hasOne('User', 'id', 'users_id');
    }

    public function customer()
    {
        return $this->hasOne('Customer', 'id', 'customers_id');
    }
}
