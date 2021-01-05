<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    public function brand()
    {
        return $this->hasMany('App\Brand');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
