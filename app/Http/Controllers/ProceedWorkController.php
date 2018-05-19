<?php

namespace App\Http\Controllers;

use App\ProceedWork;
use App\SoldierIdentity;
use Illuminate\Http\Request;

class ProceedWorkController extends Controller
{
    public function displayAll()
    {
        $soldiers = ProceedWork::paginate(25);
        return view('soldiers-management.proceed-work.index', compact('soldiers'));
    }

    public function edit()
    {

    }

    function displayProceed()
    {
        $soldiers = ProceedWork::paginate(25);
        return view('soldiers-management.proceed-work.show', compact('soldiers'));
    }

    function updateProceed(Request $request)
    {
        if ($request->proceed) {
            foreach ($request->proceed as $key => $proceed) {
                if ($proceed['general_number']) {
                    $soldier = SoldierIdentity::where('general_number', $proceed['general_number'])->first();
                    if ($soldier) {
                        $before = ProceedWork::where('soldier_id', $soldier->id)->first();
                        if ($before) {
                            $before->update([
                                'unit' => $proceed['unit'],
                                'join_date' => $proceed['join_date'],
                                'reason' => $proceed['reason'],
                                'taken_action' => $proceed['taken_action'],
                                'notes' => $proceed['notes'],
                            ]);
                        } else {
                            ProceedWork::create([
                                'soldier_id' => $soldier->id,
                                'unit' => $proceed['unit'],
                                'join_date' => $proceed['join_date'],
                                'reason' => $proceed['reason'],
                                'taken_action' => $proceed['taken_action'],
                                'notes' => $proceed['notes'],
                            ]);
                        }

                    }
                }

            }
        }
        return redirect()->route('proceed-soldiers.displayAll');
    }

    public function print()
    {
        $soldiers = ProceedWork::all();
        return view('print.soldier-management.proceed', compact('soldiers'));
    }

    public function delete(ProceedWork $soldier)
    {
        $soldier->delete();
        return redirect()->route('proceed-soldiers.displayAll');

    }
}
