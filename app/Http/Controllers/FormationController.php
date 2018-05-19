<?php

namespace App\Http\Controllers;

use App\Formation;
use App\FormationSoldiers;
use App\SoldierIdentity;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FormationController extends Controller
{

    function index()
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(6)) {
            $soldiers = Formation::first()->soldiers;
            return view('formation.index', compact('soldiers'));
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
        if (count($request->formation)) {
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
                                    'soldier_id' => $soldier->id,
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
        }

        alert()->success('التشكيل', 'تم الحفظ بنجاح');

        return redirect()->route('formation.index');
    }

    function show(Formation $formation)
    {
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8)) {
            return view('formation.show', compact('formation'));
        }
        return view('not-authorize');
    }

    function update(Formation $formation, Request $request)
    {
        $private_numbers = collect();
        $private_numbers_prev = collect();
        try {
            $formation->update(['name' => $request->formation_name]);
            $formation->soldiers()->delete();
            if (count($request->formation)) {
                foreach ($request->formation as $key => $lFormation) {
                    if ($lFormation['private_number']) {

                        if ($private_numbers->has($lFormation['private_number'])) {
                            $private_numbers_prev->put('private', $lFormation['private_number']);
                        }

                        $private_numbers->put($lFormation['private_number'], $lFormation['private_number']);
                        $soldier_exists = FormationSoldiers::where('private_number', $lFormation['private_number'])->first();
                        if (!$soldier_exists) {
                            if ($lFormation['general_number']) {
                                $soldier = SoldierIdentity::where('general_number', $lFormation['general_number'])->first();
                                if ($soldier) {
                                    $soldier_found = FormationSoldiers::where('soldier_id', $soldier->id)->first();
                                    if (!$soldier_found) {
                                        FormationSoldiers::create([
                                            'formation_id' => $formation->id,
                                            'soldier_id' => $soldier->id,
                                            'private_number' => $lFormation['private_number'],
                                            'job_description' => $lFormation['job_description'],
                                            'current_rate' => $lFormation['current_rate'],
                                            'is_participate' => isset($lFormation['is_participate']) ? 1 : 0,
                                            'is_a' => $lFormation['is_a'] ?? 0,
                                            'notes' => $lFormation['notes'],
                                            'soldier_status' => $lFormation['soldier_status'] ?? 0

                                        ]);
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
                                            'soldier_status' => $lFormation['soldier_status'] ?? 0
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
                                        'soldier_status' => $lFormation['soldier_status'] ?? 0
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
                                    'soldier_status' => $lFormation['soldier_status'] ?? 0
                                ]);
                            }

                        }

                    }
                }

                if ($private_numbers_prev->count()) {
                    alert()->success('التشكيل', 'تم الحفظ بنجاح وتم حذف الأرقام المكررة');
                } else {
                    alert()->success('التشكيل', 'تم الحفظ بنجاح');

                }
            }


        } catch (QueryException $e) {
            alert()->error('التشكيل', 'لم يتم الحفظ');
            return redirect()->route('formation.index');
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


    function destroy(Formation $formation)
    {
        $formation->soldiers()->delete();
        $formation->delete();

        return redirect()->route('formation.index');
    }


    function print(Formation $formation)
    {
        return view('print.formation', compact('formation'));
    }


    function search(Request $request)
    {
        if($request->get('target') == 1){
            $soldier = SoldierIdentity::where('general_number',$request->get('search'))->first();
            if($soldier){
                $soldiers = FormationSoldiers::where('soldier_id', $soldier->id)->get();
                return view('formation.index', compact('soldiers'));
            }
        }
        else if ($request->get('target') == 2){
            $soldiers = FormationSoldiers::where('private_number', $request->get('search'))->get();
            if ($soldiers->count()) {
                return view('formation.index', compact('soldiers'));
            } else {
                alert()->error('التشكيل', 'يرجى التأكد من الرقم المدخل ');
                return redirect()->route('formation.index');
            }
        }
        else if ($request->get('target') == 3 && $request->get('search')['is_a']){
            $soldiers = FormationSoldiers::where('is_a', $request->get('search')['is_a'])->get();
            if ($soldiers->count()) {
                return view('formation.index', compact('soldiers'));
            } else {
                alert()->error('التشكيل', 'لايوجد جنود تحت هذا التصنيف ');
                return redirect()->route('formation.index');
            }
        }

        else if ($request->get('target') == 4 && $request->get('search')['rate']){
            $soldiers = FormationSoldiers::whereHas('soldier', function ($q) use ($request){
                $q->where('rank_id',$request->get('search')['rate']);
            })->get();
            if ($soldiers->count()) {
                return view('formation.index', compact('soldiers'));
            } else {
                alert()->error('التشكيل', 'لايوجد جنود تحت هذا التصنيف ');
                return redirect()->route('formation.index');
            }
        }

        else if ($request->get('target') == 5 && $request->get('search')['status'] !=0){
            $soldiers = FormationSoldiers::where('soldier_status',$request->get('search')['status'])->get();
            if ($soldiers->count()) {
                return view('formation.index', compact('soldiers'));
            } else {
                alert()->error('التشكيل', 'لايوجد جنود تحت هذا التصنيف ');
                return redirect()->route('formation.index');
            }
        }
        return redirect()->route('formation.index');

    }
}

