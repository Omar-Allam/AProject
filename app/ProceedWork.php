<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProceedWork extends Model
{
    protected $fillable = ['soldier_id','unit','join_date','reason','taken_action','notes'];
    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id');
    }
}
