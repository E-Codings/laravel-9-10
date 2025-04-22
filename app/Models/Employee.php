<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // public $timestamps = null;
    protected $fillable = [ // allow field to insert to db
        'name',
        'gender',
        'position',
        'salary',
        'address'
    ];
}
