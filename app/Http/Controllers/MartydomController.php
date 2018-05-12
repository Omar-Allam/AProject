<?php

namespace App\Http\Controllers;

use App\Martydom;
use App\SoldierIdentity;
use Illuminate\Http\Request;

class MartydomController extends Controller
{

    public function displayAll()
    {
        $soldiers = Martydom::paginate(25);
        return view('soldiers-management.martydom.index', compact('soldiers'));
    }

    public function edit()
    {

    }

    function displayMartydom()
    {
        $soldiers = Martydom::paginate(25);
        return view('soldiers-management.martydom.show', compact('soldiers'));
    }

    function updateMartydom(Request $request)
    {
        if ($request->martyrdom) {
            foreach ($request->martyrdom as $key => $martyrdom) {
                $soldier = SoldierIdentity::where('general_number', $martyrdom['general_number'])->first();
                if ($soldier) {
                    $before = Martydom::where('soldier_id', $soldier->id)->first();
                    if ($before) {
                        $before->update([
                            'martyrdom_date' => $martyrdom['martyrdom_date'],
                            'injury_type' => $martyrdom['injury_type'],
                            'martyrdom_place' => $martyrdom['martyrdom_place'],
                            'notes' => $martyrdom['notes'],

                        ]);
                    } else {
                        Martydom::create([
                            'soldier_id' => $soldier->id,
                            'martyrdom_date' => $martyrdom['martyrdom_date'],
                            'injury_type' => $martyrdom['injury_type'],
                            'martyrdom_place' => $martyrdom['martyrdom_place'],
                            'notes' => $martyrdom['notes'],
                        ]);
                    }

                }
            }
        }
        return redirect()->route('martyrdom-soldiers.displayAll');
    }

    public function print()
    {
        $soldiers = Martydom::all();
        return view('print.soldier-management.martydom', compact('soldiers'));
    }

    public function delete(Martydom $soldier)
    {
        $soldier->delete();
        return redirect()->route('martyrdom-soldiers.displayAll');

    }
}
