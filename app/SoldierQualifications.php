<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierQualifications extends Model
{
    protected $fillable = ['form_id','soldier_id','soldier_level','soldier_specialization','soldier_educational_place_name','soldier_educational_place','soldier_graduation_date'];
}
