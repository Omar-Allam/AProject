<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierSickLeave extends Model
{
    protected $table = 'sick_leaves';
    protected $fillable = ['soldier_id','leave_from','leave_to','direct_date','reason','prev_balance','period_of_vacation','side_of_acceptance','notes'];

    protected $dates = ['leave_from','leave_to','direct_date'];
    function soldier(){
        return $this->belongsTo(SoldierIdentity::class,'soldier_id');
    }
}
