<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    const TABLE_NAME = 'courses';
    const ID = 'id';
    const TITTLE = 'title';
    const DESCRIPTION = 'description';
    const PRICE = 'price';
    const START_DATE = 'start_date';
    const END_DATE = 'end_date';
    const USER_ID = 'user_id';
}
