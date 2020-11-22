<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyName extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'id',
        'company_name'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
