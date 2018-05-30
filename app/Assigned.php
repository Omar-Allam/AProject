<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigned extends Model
{
    protected $table = 'assigned';

    protected $fillable = ['soldier_id','main_unit','assigned_unit','assigned_start','assigned_end','notes'];

    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id');
    }
}
