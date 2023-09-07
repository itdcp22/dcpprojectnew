<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    
    protected $dates = ['th_bill_dt'];

    

    public function getRouteKeyName()
{
    return 'th_tran_no';
    
}

public function item()
{
    return $this->hasMany('App\Item');
}

public function category()
{
    $this->belongsTo('App\Category');
}

}



