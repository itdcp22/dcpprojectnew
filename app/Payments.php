<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = [
        'pay_supp_acc_name', 'pay_supp_acc_no',
    ];
}
