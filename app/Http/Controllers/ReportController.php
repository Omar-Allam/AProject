<?php

namespace App\Http\Controllers;

use App\Formation;
use App\FormationSoldiers;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function hazmParticipation(){
        $soldiers = FormationSoldiers::where('is_participate',1)->paginate(15);
        return view('reports.hazm_storm_participation',compact('soldiers'));
    }

    function humanEnergy(){
        $soldiers = FormationSoldiers::paginate(15);
        return view('reports.human_energy',compact('soldiers'));
    }

    function engineer_weapon(){
        return view('reports.engineer_weapon');
    }
}
