<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierIdentity extends Model
{
    protected $table = 'soldier_identities';
    protected $fillable = ['form_id','first_name','father_name','grandfather_name','family_name','rank_id','general_number','power_id','unit','region_id','hiring_date','decision_number','decision_date','decision_side','specialization','weapon','enroll_date','promotion_date','installed_job','worked_job','id_number','id_source','id_date','graduate_side','place_of_birth','external_city','date_of_birth','place_of_origin','social_status','current_address','home_phone','mobile_phone','medical_status','blood_type','seniority_promotions','decorations_medals','army_decision'
];
}
