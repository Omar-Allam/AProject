<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierCourses extends Model
{
    protected $fillable = ['form_id', 'soldier_id', 'course_name', 'course_time_frame', 'course_place', 'graduation_date', 'course_grade'];

    static $grades = [1 => 'ممتاز', 2 => 'جيد جدا', 3 => 'جيد', 4 => 'ضعيف'];
}
