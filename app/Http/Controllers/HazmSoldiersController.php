<?php

namespace App\Http\Controllers;

use App\FormationSoldiers;
use App\HazmSoldiers;
use App\SoldierIdentity;
use Illuminate\Http\Request;

class HazmSoldiersController extends Controller
{
    public function displayAll()
    {
        $soldiers = FormationSoldiers::where('is_participate', 1)->paginate(25);
        return view('soldiers-management.hazm.index', compact('soldiers'));
    }

    public function edit()
    {

    }

    function displayHazm()
    {
        $soldiers = FormationSoldiers::where('is_participate', 1)->paginate(25);
        return view('soldiers-management.hazm.show', compact('soldiers'));
    }

    function updateHazm(Request $request)
    {

        if (count($request->participation)) {
            foreach ($request->participation as $key => $participation) {
                $soldier = SoldierIdentity::where('general_number', $participation['general_number'])->first();
                if ($soldier) {
                    $hazmExist = HazmSoldiers::where('soldier_id', $soldier->id)->first();
                    if ($hazmExist) {
                        $hazmExist->update([
                            'start_date' => $participation['start_date'],
                            'end_date' => $participation['end_date'],
                            'place_of_participation' => $participation['place_of_participation'],
                            'type_of_participation' => $participation['type_of_participation'],
                            'main_power' => $participation['main_power'],
                            'civil_register' => $participation['civil_register'],
                            'unit' => $participation['unit'],
                        ]);
                    } else {
                        HazmSoldiers::create([
                            'soldier_id' => $soldier->id,
                            'start_date' => $participation['start_date'],
                            'end_date' => $participation['end_date'],
                            'place_of_participation' => $participation['place_of_participation'],
                            'type_of_participation' => $participation['type_of_participation'],
                            'main_power' => $participation['main_power'],
                            'civil_register' => $participation['civil_register'],
                            'unit' => $participation['unit'],
                        ]);
                    }

                }
            }
        }
        return redirect()->route('hazm-soldiers.displayAll');
    }

    public function print()
    {
        $soldiers = FormationSoldiers::where('is_participate', 1)->get();
        return view('print.soldier-management.hazm-participation',compact('soldiers'));
    }
}
