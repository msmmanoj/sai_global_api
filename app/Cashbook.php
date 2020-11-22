<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cashbook extends Model
{
    protected $table = 'cashbook';

    protected $fillable = [
        'amount',
        'acc_name',
        'acc_date',
        'is_credit',
        'company'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
