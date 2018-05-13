<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrolledSoldier extends Model
{
    protected $fillable = [
        'soldier_id','main_unit','enroll_unit','enroll_start','enroll_end','notes'
    ];

    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id');
    }
}
