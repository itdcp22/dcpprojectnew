<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchaserequest extends Model
{

    protected $fillable = [
        'pr_req_comp_code',
        'pr_req_comp_name',
        'pr_req_no',
        'pr_req_name',
        'pr_req_mobile',

    ];

    //  protected $primaryKey = 'id';
    // protected $table = 'purchaserequests';

    public function purchaserequestitem()
    {
        return $this->hasMany('App\Purchaserequestitem');
    }
}
