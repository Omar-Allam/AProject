<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierJobs extends Model
{
    protected $fillable = ['form_id','soldier_id','job_name','soldier_job_unit','consider_from'];
}
