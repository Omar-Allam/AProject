<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierVacations extends Model
{
    protected $fillable = ['form_id','soldier_id','vacation_type','vacation_period','vacation_place','vacation_end_date'];
}
