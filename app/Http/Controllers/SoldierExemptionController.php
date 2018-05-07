<?php

namespace App\Http\Controllers;

use App\SoldierExemption;
use App\SoldierIdentity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoldierExemptionController extends Controller
{
    function index()
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(14)) {
            $exemptions = SoldierExemption::all();
            return view('medical-exemption.index', compact('exemptions'));
        }
        return view('not-authorize');

    }

    function create()
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(15)) {
            return view('medical-exemption.create');
        }
        return view('not-authorize');
    }

    function show(SoldierExemption $exemption)
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(16)) {
            return view('medical-exemption.show', compact('exemption'));
        }
        return view('not-authorize');

    }

    function update(SoldierExemption $exemption, Request $request)
    {
        $exemption->update([
            "reason" => $request->exemption[0]['reason'],
            "start_from" => $request->exemption[0]['start_from'],
            "end_at" => $request->exemption[0]['end_at'],
            "exemption_period" => $request->exemption[0]['period_of_vacation'],
            "prev_balance" => $request->exemption[0]['prev_balance'],
            "side_of_acceptance" => $request->exemption[0]['side_of_acceptance'],
            "notes" => $request->exemption[0]['notes'],
            "tasks" => $request->exemption[0]['tasks'],
        ]);

        return redirect()->route('exemption.index');
    }

    function store(Request $request)
    {

        if(count($request->exemption)){
            foreach ($request->exemption as $exemption) {
                $soldier = SoldierIdentity::where('general_number', $exemption['general_number'])->first();

                if ($soldier) {
                    SoldierExemption::create([
                        'soldier_id' => $soldier->id,
                        'start_from' => $exemption['start_from'],
                        'end_at' => $exemption['end_at'],
                        'reason' => $exemption['reason'],
                        'prev_balance' => $exemption['prev_balance'],
                        'period_of_vacation' => $exemption['period_of_vacation'],
                        'side_of_acceptance' => $exemption['side_of_acceptance'],
                        'notes' => $exemption['notes'],
                        "tasks" => $request->exemption[0]['tasks'],
                    ]);
                }
            }
        }
        return redirect()->route('exemption.index');
    }

    function destroy(SoldierExemption $exemption)
    {
        $exemption->delete();

        return redirect()->route('exemption.index');
    }
    function print(){
        $exemptions = SoldierExemption::all();
        return view('print.exemption',compact('exemptions'));
    }
}
