<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldierIdentity extends Model
{
    protected $table = 'soldier_identities';
    protected $fillable = ['first_name', 'father_name', 'grandfather_name', 'family_name', 'rank_id', 'general_number', 'power_id', 'unit', 'region_id', 'hiring_date', 'decision_number', 'decision_date', 'decision_side', 'specialization', 'weapon', 'enroll_date', 'promotion_date', 'installed_job', 'worked_job', 'id_number', 'id_source', 'id_date', 'graduate_side', 'place_of_birth', 'external_city', 'date_of_birth', 'place_of_origin', 'social_status', 'current_address', 'home_phone', 'mobile_phone', 'medical_status', 'blood_type', 'seniority_promotions', 'decorations_medals', 'army_decision', 'created_by', 'last_update_by', 'exeption_promotions', 'medals', 'issued_decisions', 'vacations_and_places', 'annual_year'
        , 'annual_personal_adj', 'annual_performance', 'nofoos_save'];


    function morphToJson()
    {
        return [
            'name' => $this->first_name . ' ' . $this->father_name . ' ' . $this->grandfather_name . ' ' . $this->family_name,
            'rank' => $this->rank->name,
            'job_description' => $this->installed_job,
        ];
    }

    function rank()
    {
        return $this->belongsTo(SoldierRate::class, 'rank_id');
    }

    function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->father_name . ' ' . $this->grandfather_name . ' ' . $this->family_name;
    }

    function relatives()
    {
        return $this->hasMany(SoldierRelatives::class, 'soldier_id');
    }

    function qualifications()
    {
        return $this->hasMany(SoldierQualifications::class, 'soldier_id');
    }

    function sons()
    {
        return $this->hasMany(SoldierSons::class, 'soldier_id');
    }

    function courses()
    {
        return $this->hasMany(SoldierCourses::class, 'soldier_id');
    }

    function jobs()
    {
        return $this->hasMany(SoldierJobs::class, 'soldier_id');
    }

    function vacations()
    {
        return $this->hasMany(SoldierVacations::class, 'soldier_id');
    }

    function languages()
    {
        return $this->hasMany(SoldierLanguages::class, 'soldier_id');
    }

    function region()
    {
        return $this->belongsTo(Regions::class, 'region_id');
    }

    function side()
    {
        return $this->belongsTo(Specialization::class, 'decision_side');
    }

    function weapon()
    {
        return $this->belongsTo(Specialization::class, 'weapon');
    }

    static function getArabic($str){
        $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
        $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');

        $str = str_replace($western_arabic, $eastern_arabic, $str);

        return $str;
    }

}
