<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Martydom extends Model
{
    protected $fillable = ['soldier_id', 'martyrdom_date', 'injury_type', 'martyrdom_place', 'notes'];

    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id');
    }
}
