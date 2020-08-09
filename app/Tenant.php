<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    public function brand()
    {
        return $this->hasMany('App\Brand');
    }
}
