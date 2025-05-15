<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public const TABLE = 'permission';
    public const ID = 'id';
    public const TITLE =  'title';
    public const CREATED_AT = 'created_at';
}
