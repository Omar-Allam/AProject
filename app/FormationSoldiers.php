<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class FormationSoldiers extends Model
{
    protected $table = 'formation_soldiers';
    protected $fillable = ['formation_id', 'soldier_id', 'job_description', 'current_rate', 'notes', 'private_number', 'is_participate', 'is_a','soldier_status'];

    function soldier()
    {
        return $this->belongsTo(SoldierIdentity::class, 'soldier_id', 'id');
    }

    function rank()
    {
        return $this->belongsTo(SoldierRate::class, 'current_rate', 'id');
    }


    static function human_energy()
    {
        $officer_total = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereNotIn('rank_id', [1, 2, 5, 6]);
        })->count(); // All officers

        $free_officers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereNotIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 1)->count();


        $freezed_officers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereNotIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 2)->count();

        $gained_officers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereNotIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 3)->count();

        $sortable_officers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereNotIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 4)->count();


        $soldier_total = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereIn('rank_id', [1, 2, 5, 6]);
        })->count();

        $free_soldiers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 1)->count();

        $freezed_soldiers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 2)->count();

        $gained_soldiers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 3)->count();

        $sortable_soldiers = FormationSoldiers::whereHas('soldier', function ($q) {
            $q->whereIn('rank_id', [1, 2, 5, 6]);
        })->where('is_a', 4)->count();

        $report = compact('officer_total', 'free_officers', 'freezed_officers', 'gained_officers', 'sortable_officers'
            , 'soldier_total', 'free_soldiers', 'freezed_soldiers', 'gained_soldiers', 'sortable_soldiers');



        return collect($report);
    }
}
