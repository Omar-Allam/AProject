<?php

namespace App\Http\Controllers;

use App\IdentitiyForm;
use App\SoldierCourses;
use App\SoldierIdentity;
use App\SoldierJobs;
use App\SoldierQualifications;
use App\SoldierRelatives;
use App\SoldierSons;
use App\SoldierVacations;
use Illuminate\Http\Request;

class SoldierIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soldiers = SoldierIdentity::paginate(15);

        return view('soldier_identity.index',compact('soldiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('soldier_identity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = IdentitiyForm::create([
            'created_by' => 1
        ]);
        $identity = SoldierIdentity::create([
            'form_id' => $form->id,
            'first_name' => $request->first_name,
            'father_name' => $request->father_name,
            'grandfather_name' => $request->grandfather_name,
            'family_name'=>$request->family_name,
            'rank_id'=>$request->rank_id,
            'general_number'=>$request->general_number,
            'power_id'=>$request->power_id,
            'unit'=>$request->unit,
            'region_id'=>$request->region_id,
            'hiring_date'=>$request->hiring_date,
            'decision_number'=>$request->decision_number,
            'decision_date'=>$request->decision_date,
            'decision_side'=>$request->decision_side,
            'specialization'=>$request->specialization,
            'weapon'=>$request->weapon,
            'enroll_date'=>$request->enroll_date,
            'promotion_date'=>$request->promotion_date,
            'installed_job'=>$request->installed_job,
            'id_number'=>$request->id_number,
            'id_source'=>$request->id_source,
            'graduate_side'=>$request->graduate_side,
            'place_of_birth'=>$request->place_of_birth,
            'external_city'=>$request->external_city,
            'date_of_birth'=>$request->date_of_birth,
            'place_of_origin'=>$request->place_of_origin,
            'social_status'=>$request->social_status,
            'current_address'=>$request->current_address,
            'home_phone'=>$request->home_phone,
            'mobile_phone'=>$request->mobile_phone
        ]);

        if(count($request->relatives)){
            foreach ($request->relatives as $relative){
                SoldierRelatives::create([
                    'form_id'=>$form->id,
                    'soldier_id'=>$identity->id,
                    'relative_name'=> $relative['relative_name'],
                    'relative_type'=>$relative['relative_type'],
                    'original_nationality'=>$relative['original_nationality'],
                    'current_nationality'=>$relative['current_nationality'],
                    'relative_place_of_origin'=>$relative['relative_place_of_origin'],
                    'relative_place_of_birth'=>$relative['relative_date_of_birth'],
                    'relative_date_of_birth'=>$relative['relative_date_of_birth']
                ]);
            }
        }
        if(count($request->qualifications)){
            foreach ($request->qualifications as $qualification){
                SoldierQualifications::create([
                    'form_id'=>$form->id,
                    'soldier_id'=>$identity->id,
                    'soldier_level'=> $qualification['soldier_level'],
                    'soldier_specialization'=>$qualification['soldier_specialization'],
                    'soldier_educational_place_name'=>$qualification['soldier_educational_place_name'],
                    'soldier_educational_place'=>$qualification['soldier_educational_place'],
                    'soldier_graduation_date'=>$qualification['soldier_graduation_date'],
                ]);
            }
        }

        if(count($request->sons)){
            foreach ($request->sons as $son){
                SoldierSons::create([
                    'form_id'=>$form->id,
                    'soldier_id'=>$identity->id,
                    'soldier_son_name'=> $son['soldier_son_name'],
                    'soldier_son_date_of_birth'=>$son['soldier_son_date_of_birth'],
                ]);
            }
        }

        if(count($request->course)){
            foreach ($request->course as $course){
                SoldierCourses::create([
                    'form_id'=>$form->id,
                    'soldier_id'=>$identity->id,
                    'course_name'=> $course['course_name'],
                    'course_time_frame'=>$course['course_time_frame'],
                    'course_place'=>$course['course_place'],
                    'graduation_date'=>$course['graduation_date'],
                    'course_grade'=>$course['course_grade'],
                ]);
            }
        }

        if(count($request->jobs)){
            foreach ($request->jobs as $job){
                SoldierJobs::create([
                    'form_id'=>$form->id,
                    'soldier_id'=>$identity->id,
                    'job_name'=> $job['job_name'],
                    'soldier_job_unit'=>$job['soldier_job_unit'],
                    'consider_from'=>$job['consider_from'],
                ]);
            }
        }

        if(count($request->vacations)){
            foreach ($request->vacations as $vacation){
                SoldierVacations::create([
                    'form_id'=>$form->id,
                    'soldier_id'=>$identity->id,
                    'vacation_type'=> $vacation['vacation_type'],
                    'vacation_period'=> $vacation['vacation_period'],
                    'vacation_place'=> $vacation['vacation_place'],
                    'vacation_end_date'=> $vacation['vacation_end_date'],
                ]);
            }
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soldier = SoldierIdentity::find($id);
        return view('soldier_identity.edit',compact('soldier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soldierIdentity = SoldierIdentity::find($id);
        $soldierIdentity->sons()->delete();
        $soldierIdentity->courses()->delete();
        $soldierIdentity->jobs()->delete();
        $soldierIdentity->relatives()->delete();
        $soldierIdentity->qualifications()->delete();
        $soldierIdentity->vacations()->delete();

        $soldierIdentity->delete();

        return redirect()->route('identity.index');
    }
}
