<?php

namespace App\Http\Controllers;

use App\Formation;
use App\FormationSoldiers;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function hazmParticipation(){
        $soldiers = FormationSoldiers::whereNotNull('soldier_id')->where('is_participate',1)->paginate(15);
        return view('reports.hazm_storm_participation',compact('soldiers'));
    }

    function humanEnergy(){
        $soldiers = FormationSoldiers::paginate(15);
        return view('reports.human_energy',compact('soldiers'));
    }

    function engineer_weapon(){
        return view('reports.engineer_weapon');
    }

    function printHazm(){
        $soldiers = FormationSoldiers::whereNotNull('soldier_id')->where('is_participate',1)->get();
        return view('print.reports.hazm',compact('soldiers'));
    }


    function printEnergy(){
        $soldiers = FormationSoldiers::all();
        return view('print.reports.human_energy',compact('soldiers'));
    }

    function printWeapon(){
        return view('print.reports.engineer-weapon');
    }
}
