<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierLanguages extends Model
{
    protected $fillable = ['form_id','soldier_id','language_id'];
}
