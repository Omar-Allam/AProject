<?php

namespace App\Http\Controllers;

use App\SoldierIdentity;
use App\SuspendSalarySoldier;
use Illuminate\Http\Request;

class SuspendSalarySoldierController extends Controller
{
    public function displayAll()
    {
        $soldiers = SuspendSalarySoldier::paginate(25);
        return view('soldiers-management.suspend.index', compact('soldiers'));
    }

    public function edit()
    {

    }

    function displaySuspend()
    {
        $soldiers = SuspendSalarySoldier::paginate(25);
        return view('soldiers-management.suspend.show', compact('soldiers'));
    }

    function updateSuspend(Request $request)
    {
        if ($request->suspend) {
            foreach ($request->suspend as $key => $suspend) {
                if ($suspend['general_number']) {
                    $soldier = SoldierIdentity::where('general_number', $suspend['general_number'])->first();
                    if ($soldier) {
                        $before = SuspendSalarySoldier::where('soldier_id', $soldier->id)->first();
                        if ($before) {
                            $before->update([
                                'unit' => $suspend['unit'],
                                'suspend_reason' => $suspend['suspend_reason'],
                                'suspend_start' => $suspend['suspend_start'],
                                'taken_action' => $suspend['taken_action'],
                                'notes' => $suspend['notes'],
                            ]);
                        } else {
                            SuspendSalarySoldier::create([
                                'soldier_id' => $soldier->id,
                                'unit' => $suspend['unit'],
                                'suspend_reason' => $suspend['suspend_reason'],
                                'suspend_start' => $suspend['suspend_start'],
                                'taken_action' => $suspend['taken_action'],
                                'notes' => $suspend['notes'],
                            ]);
                        }

                    }
                }

            }
        }
        return redirect()->route('suspend-soldiers.displayAll');
    }

    public function print()
    {
        $soldiers = SuspendSalarySoldier::all();
        return view('print.soldier-management.suspend', compact('soldiers'));
    }

    public function delete(SuspendSalarySoldier $soldier)
    {
        $soldier->delete();
        return redirect()->route('suspend-soldiers.displayAll');

    }
}
