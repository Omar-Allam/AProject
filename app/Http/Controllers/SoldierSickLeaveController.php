<?php

namespace App\Http\Controllers;

use App\SoldierIdentity;
use App\SoldierSickLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoldierSickLeaveController extends Controller
{
    function index()
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(10)) {
            $sickLeaves = SoldierSickLeave::all();
            return view('sick-leave.index', compact('sickLeaves'));
        }
        return view('not-authorize');

    }

    function create()
    {
        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(11)){
            return view('sick-leave.create');
        }
        return view('not-authorize');
    }

    function show(SoldierSickLeave $sickLeave)
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(12)) {
            return view('sick-leave.show', compact('sickLeave'));
        }
        return view('not-authorize');
    }

    function update(SoldierSickLeave $sickLeave, Request $request)
    {
        $sickLeave->update(["reason" => $request->sickLeave[0]['reason'],
            "leave_from" => $request->sickLeave[0]['leave_from'],
            "leave_to" => $request->sickLeave[0]['leave_to'],
            "period_of_vacation" => $request->sickLeave[0]['period_of_vacation'],
            "direct_date" => $request->sickLeave[0]['direct_date'],
            "prev_balance" => $request->sickLeave[0]['prev_balance'],
            "side_of_acceptance" => $request->sickLeave[0]['side_of_acceptance'],
            "notes" => $request->sickLeave[0]['notes']]);

        return redirect()->route('sick-leave.index');
    }

    function store(Request $request)
    {
        if(count($request->sickLeave)){
            foreach ($request->sickLeave as $sick_leave) {
                $soldier = SoldierIdentity::where('general_number', $sick_leave)->first();
                if ($soldier) {
                    SoldierSickLeave::create([
                        'soldier_id' => $soldier->id,
                        'leave_from' => $sick_leave['leave_from'],
                        'leave_to' => $sick_leave['leave_to'],
                        'direct_date' => $sick_leave['direct_date'],
                        'reason' => $sick_leave['reason'],
                        'prev_balance' => $sick_leave['prev_balance'],
                        'period_of_vacation' => $sick_leave['period_of_vacation'],
                        'side_of_acceptance' => $sick_leave['side_of_acceptance'],
                        'notes' => $sick_leave['notes']
                    ]);
                }
            }
        }
        return redirect()->route('sick-leave.index');

    }

    function destroy(SoldierSickLeave $sickLeave)
    {
        $sickLeave->delete();
        return redirect()->route('sick-leave.index');
    }

    function print(){
        $sickLeaves = SoldierSickLeave::all();
        return view('print.sickleave',compact('sickLeaves'));
    }
}
