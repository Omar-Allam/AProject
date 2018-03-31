<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierRelatives extends Model
{
    protected $fillable = ['form_id','soldier_id','relative_name','relative_type','current_nationality','original_nationality','relative_place_of_origin','relative_place_of_birth','relative_date_of_birth'];
}
