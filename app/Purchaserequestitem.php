<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaserequestitem extends Model
{



    public $table = "purchaserequestitems";

    public $fillable = ['pri_item', 'pri_qty', 'pri_reason', 'pri_flex1', 'pri_flex2', 'purchaserequest_id',];

    protected $primaryKey = 'id';

    public function purchaserequest()
    {
        return $this->belongsTo('App\Purchaserequest');
    }
}
