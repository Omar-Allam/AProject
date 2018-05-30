<?php

namespace App\Http\Controllers;

use App\Assigned;
use App\SoldierIdentity;
use Illuminate\Http\Request;

class AssignedController extends Controller
{
    public function displayAll()
    {
        $soldiers = Assigned::paginate(25);
        return view('soldiers-management.assigned.index', compact('soldiers'));
    }

    public function edit()
    {

    }

    function displayAssign()
    {
        $soldiers = Assigned::paginate(25);
        return view('soldiers-management.assigned.show', compact('soldiers'));
    }

    function updateAssign(Request $request)
    {
        if ($request->assign) {
            foreach ($request->assign as $key => $assign) {
                if ($assign['general_number']) {
                    $soldier = SoldierIdentity::where('general_number', $assign['general_number'])->first();
                    if ($soldier) {
                        $before = Assigned::where('soldier_id', $soldier->id)->first();
                        if ($before) {
                            $before->update([
                                'main_unit' => $assign['main_unit'],
                                'assigned_unit' => $assign['assigned_unit'],
                                'assigned_start' => $assign['assigned_start'],
                                'assigned_end' => $assign['assigned_end'],
                                'notes' => $assign['notes'],
                            ]);
                        } else {
                            Assigned::create([
                                'soldier_id' => $soldier->id,
                                'main_unit' => $assign['main_unit'],
                                'assigned_unit' => $assign['assigned_unit'],
                                'assigned_start' => $assign['assigned_start'],
                                'assigned_end' => $assign['assigned_end'],
                                'notes' => $assign['notes'],
                            ]);
                        }

                    }
                }

            }
        }
        return redirect()->route('assigned-soldiers.displayAll');
    }

    public function print()
    {
        $soldiers = Assigned::all();
        return view('print.soldier-management.assigned', compact('soldiers'));
    }

    public function delete(Assigned $soldier)
    {
        $soldier->delete();
        return redirect()->route('assigned-soldiers.displayAll');

    }
}
