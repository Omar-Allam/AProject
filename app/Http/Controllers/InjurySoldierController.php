<?php

namespace App\Http\Controllers;

use App\InjurySoldier;
use App\SoldierIdentity;
use Illuminate\Http\Request;

class InjurySoldierController extends Controller
{

    public function displayAll()
    {
        $soldiers = InjurySoldier::paginate(25);
        return view('soldiers-management.injury.index', compact('soldiers'));
    }

    public function edit()
    {

    }

    function displayInjury()
    {
        $soldiers = InjurySoldier::paginate(25);
        return view('soldiers-management.injury.show', compact('soldiers'));
    }

    function updateInjury(Request $request)
    {
        if ($request->injury) {
            foreach ($request->injury as $key => $injury) {
                if($injury['general_number']){
                    $soldier = SoldierIdentity::where('general_number', $injury['general_number'])->first();
                    if ($soldier) {
                        $before = InjurySoldier::where('soldier_id', $soldier->id)->first();
                        if ($before) {
                            $before->update([
                                'martyrdom_date' => $injury['injury_date'],
                                'injury_type' => $injury['injury_type'],
                                'martyrdom_place' => $injury['injury_place'],
                                'return_date' => $injury['return_date'],
                                'notes' => $injury['notes'],
                            ]);
                        } else {
                            InjurySoldier::create([
                                'soldier_id' => $soldier->id,
                                'martyrdom_date' => $injury['injury_date'],
                                'injury_type' => $injury['injury_type'],
                                'martyrdom_place' => $injury['injury_place'],
                                'return_date' => $injury['return_date'],
                                'notes' => $injury['notes'],
                            ]);
                        }

                    }
                }

            }
        }
        return redirect()->route('injury-soldiers.displayAll');
    }

    public function print()
    {
        $soldiers = InjurySoldier::all();
        return view('print.soldier-management.injury', compact('soldiers'));
    }

    public function delete(InjurySoldier $soldier)
    {
        $soldier->delete();
        return redirect()->route('injury-soldiers.displayAll');

    }
}
