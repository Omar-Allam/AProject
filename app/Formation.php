<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['name'];

    function soldiers(){
        return $this->hasMany(FormationSoldiers::class,'formation_id');
    }
}
