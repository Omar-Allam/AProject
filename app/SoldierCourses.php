<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierCourses extends Model
{
    protected $fillable = ['form_id','soldier_id','course_name','course_time_frame','course_place','graduation_date','course_grade'
];
}
