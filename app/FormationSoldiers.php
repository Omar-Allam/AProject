<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class FormationSoldiers extends Model
{
    protected $table = 'formation_soldiers';
    protected $fillable = ['formation_id', 'soldier_id', 'job_description', 'current_rate', 'notes', 'private_number', 'is_participate', 'is_a', 'soldier_status'];

    protected $dates = [''];
    static $status = [1 => 'منقول على الوحدة', 2 => 'معين على الوحدة', 3 => 'منهاه خدمته', 4 => 'معاد', 5 => 'منقول خارج الوحدة', 6 => 'مفرز منتدب', 7 => 'الملحق ( مكتب )'];
    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id', 'id');
    }

    function rank()
    {
        return $this->belongsTo(SoldierRate::class, 'current_rate', 'id');
    }


    static function human_energy($rate,$type)
    {
        return FormationSoldiers::whereHas('soldier', function ($q) use ($rate){
            $q->whereIn('rank_id', $rate);
        })->whereIn('is_a',$type)->count(); // All officers

    }


    static function tranfer($type, $status)
    {
        return FormationSoldiers::whereHas('soldier', function ($q) use ($type) {
            $q->whereIn('rank_id', $type);
        })->where('soldier_status', $status)->count();
    }


}
