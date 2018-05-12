<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HazmSoldiers extends Model
{
    protected $table = 'hazm_soldiers';
    protected $fillable = ['soldier_id','start_date','end_date','place_of_participation','type_of_participation','main_power','civil_register','unit'];
    function soldier(){
        return $this->belongsTo(SoldierIdentity::class,'soldier_id');
    }
}
