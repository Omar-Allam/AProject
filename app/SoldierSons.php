<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierSons extends Model
{
    protected $fillable = ['form_id', 'soldier_id', 'soldier_son_name', 'soldier_son_date_of_birth'];
}
