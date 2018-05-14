<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuspendSalarySoldier extends Model
{
    protected $fillable = ['soldier_id', 'unit', 'suspend_reason', 'suspend_start', 'taken_action', 'notes'];


    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id');
    }
}
