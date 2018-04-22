<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoldierExemption extends Model
{
    protected $fillable = ['soldier_id', 'reason', 'start_from', 'end_at', 'tasks', 'prev_balance', 'side_of_acceptance','notes','exemption_period'];

    protected $dates = ['start_from', 'end_at'];

    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id');
    }
}
