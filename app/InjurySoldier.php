<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InjurySoldier extends Model
{
    protected $fillable = ['soldier_id','injury_date','injury_type','injury_place','return_date','notes'];

    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id');
    }
}


