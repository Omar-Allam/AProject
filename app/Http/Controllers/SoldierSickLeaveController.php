<?php

namespace App\Http\Controllers;

use App\SoldierIdentity;
use App\SoldierSickLeave;
use Carbon\Carbon;
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
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(11)) {
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
            'decision_number' => $request->sickLeave[0]['decision_number'],
            'decision_date' => $request->sickLeave[0]['decision_date'],
            'recommendation' => $request->sickLeave[0]['recommendation'],
            'level' => $request->sickLeave[0]['level'],
            "notes" => $request->sickLeave[0]['notes']]);

        return redirect()->route('sick-leave.index');
    }

    function store(Request $request)
    {
        if (count($request->sickLeave)) {
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
                        'decision_number' => $sick_leave['decision_number'],
                        'decision_date' => $sick_leave['decision_date'],
                        'recommendation' => $sick_leave['recommendation'],
                        'level' => $sick_leave['level'],
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

    function print()
    {
        $sickLeaves = SoldierSickLeave::all();
        return view('print.sickleave', compact('sickLeaves'));
    }

    function printSingle(SoldierSickLeave $sickLeaf)
    {
        return view('print.singles.sickleave', compact('sickLeaf'));
    }

    function search(Request $request)
    {

        if ($request->target == 1 && $request->general_number) {
            $soldier = SoldierIdentity::where('general_number',$request->general_number)->first();
            $sickLeaves = SoldierSickLeave::where('soldier_id',$soldier->id)->get();
            return view('sick-leave.index', compact('sickLeaves'));
        }elseif ($request->target == 2){
            $leave_from = Carbon::parse($request->leave_from);
            $leave_to = Carbon::parse($request->leave_to);

            $sickLeaves = SoldierSickLeave::whereBetween('leave_from',[$leave_from,$leave_from])
                ->orWhereBetween('leave_to',[$leave_to,$leave_to])->get();
            return view('sick-leave.index', compact('sickLeaves'));
        }

        return redirect()->route('sick-leave.index');

    }
}
