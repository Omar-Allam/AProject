<?php

namespace App\Http\Controllers;

use App\EnrolledSoldier;
use App\SoldierIdentity;
use Illuminate\Http\Request;

class EnrolledSoldierController extends Controller
{
    public function displayAll()
    {
        $soldiers = EnrolledSoldier::paginate(25);
        return view('soldiers-management.enroll.index', compact('soldiers'));
    }

    public function edit()
    {

    }

    function displayEnroll()
    {
        $soldiers = EnrolledSoldier::paginate(25);
        return view('soldiers-management.enroll.show', compact('soldiers'));
    }

    function updateEnroll(Request $request)
    {
        if ($request->enroll) {
            foreach ($request->enroll as $key => $enroll) {
                if ($enroll['general_number']) {
                    $soldier = SoldierIdentity::where('general_number', $enroll['general_number'])->first();
                    if ($soldier) {
                        $before = EnrolledSoldier::where('soldier_id', $soldier->id)->first();
                        if ($before) {
                            $before->update([
                                'main_unit' => $enroll['main_unit'],
                                'enroll_unit' => $enroll['enroll_unit'],
                                'enroll_start' => $enroll['enroll_start'],
                                'enroll_end' => $enroll['enroll_end'],
                                'notes' => $enroll['notes'],
                            ]);
                        } else {
                            EnrolledSoldier::create([
                                'soldier_id' => $soldier->id,
                                'main_unit' => $enroll['main_unit'],
                                'enroll_unit' => $enroll['enroll_unit'],
                                'enroll_start' => $enroll['enroll_start'],
                                'enroll_end' => $enroll['enroll_end'],
                                'notes' => $enroll['notes'],
                            ]);
                        }

                    }
                }

            }
        }
        return redirect()->route('enroll-soldiers.displayAll');
    }

    public function print()
    {
        $soldiers = EnrolledSoldier::all();
        return view('print.soldier-management.enroll', compact('soldiers'));
    }

    public function delete(EnrolledSoldier $soldier)
    {
        $soldier->delete();
        return redirect()->route('enroll-soldiers.displayAll');

    }
}
