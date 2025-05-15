<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const TABLE = 'roles';
    public const ID = 'id';
    public const Name =  'name';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
}
