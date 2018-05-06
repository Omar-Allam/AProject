<?php

namespace App\Http\Controllers;

use App\Formation;
use App\FormationSoldiers;
use App\SoldierIdentity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    function index()
    {
        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(6)){
            $formations = Formation::all();
            return view('formation.index', compact('formations'));
        }
        return view('not-authorize');

    }

    function create()
    {
        return view('formation.create');
    }

    function store(Request $request)
    {
        $new_formation = Formation::create(['name' => $request->formation_name ?? '']);

        foreach ($request->formation as $key => $formation) {
            if ($formation['private_number']) {
                $soldier_exists = FormationSoldiers::where('private_number', $formation['private_number'])->first();
                if (!$soldier_exists) {
                    if ($formation['general_number']) {
                        $soldier = SoldierIdentity::where('general_number', $formation['general_number'])->first();
                        $soldier_found = FormationSoldiers::where('soldier_id', $soldier->id)->first();
                        if ($soldier && !$soldier_found) {
                            FormationSoldiers::create([
                                'formation_id' => $new_formation->id,
                                'soldier_id' => $soldier->id ,
                                'private_number' => $formation['private_number'],
                                'job_description' => $formation['job_description'],
                                'current_rate' => $formation['current_rate'],
                                'is_participate' => isset($formation['is_participate']) ? 1 : 0,
                                'is_a' => $formation['is_a'] ?? 0,
                                'notes' => $formation['notes'],
                            ]);
                        }
                    } else {
                        FormationSoldiers::create([
                            'formation_id' => $new_formation->id,
                            'soldier_id' => null,
                            'private_number' => $formation['private_number'],
                            'job_description' => $formation['job_description'],
                            'current_rate' => $formation['current_rate'],
                            'is_participate' => isset($formation['is_participate']) ? 1 : 0,
                            'is_a' => $formation['is_a'] ?? 0,
                            'notes' => $formation['notes'],
                        ]);
                    }

                }

            }
        }
        return redirect()->route('formation.index');
    }

    function show(Formation $formation)
    {
        if(Auth::user()->hasRole(1) || Auth::user()->hasRole(8)){
            return view('formation.show', compact('formation'));
        }
        return view('not-authorize');
    }

    function update(Formation $formation, Request $request)
    {
        $formation->update(['name' => $request->formation_name]);
        $formation->soldiers()->delete();
        foreach ($request->formation as $key => $lFormation) {
            if ($lFormation['private_number']) {
                $soldier_exists = FormationSoldiers::where('private_number', $lFormation['private_number'])->first();
                if (!$soldier_exists) {
                    if ($lFormation['general_number']) {
                        $soldier = SoldierIdentity::where('general_number', $lFormation['general_number'])->first();
                        $soldier_found = FormationSoldiers::where('soldier_id', $soldier->id)->first();
                        if ($soldier && !$soldier_found) {
                            FormationSoldiers::create([
                                'formation_id' => $formation->id,
                                'soldier_id' => $soldier->id ,
                                'private_number' => $lFormation['private_number'],
                                'job_description' => $lFormation['job_description'],
                                'current_rate' => $lFormation['current_rate'],
                                'is_participate' => isset($lFormation['is_participate']) ? 1 : 0,
                                'is_a' => $lFormation['is_a'] ?? 0,
                                'notes' => $lFormation['notes'],
                            ]);
                        }
                    } else {
                        FormationSoldiers::create([
                            'formation_id' => $formation->id,
                            'soldier_id' => null,
                            'private_number' => $lFormation['private_number'],
                            'job_description' => $lFormation['job_description'],
                            'current_rate' => $lFormation['current_rate'],
                            'is_participate' => isset($lFormation['is_participate']) ? 1 : 0,
                            'is_a' => $lFormation['is_a'] ?? 0,
                            'notes' => $lFormation['notes'],
                        ]);
                    }

                }

            }
        }

        return redirect()->route('formation.index');
    }

    function getSoldierInfo(Request $request)
    {
        $soldier = SoldierIdentity::where('general_number', $request->get('general_number'))->get();
        if ($soldier->count()) {
            /** @var SoldierIdentity $soldier */
            return $soldier->first()->morphToJson();
        }
        return 0;
    }


    function destroy(Formation $formation){
        $formation->soldiers()->delete();
        $formation->delete();

        return redirect()->route('formation.index');
    }


}

