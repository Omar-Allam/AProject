<?php

namespace App\Http\Controllers;

use App\IdentitiyForm;
use App\SoldierCourses;
use App\SoldierIdentity;
use App\SoldierJobs;
use App\SoldierLanguages;
use App\SoldierQualifications;
use App\SoldierRelatives;
use App\SoldierSons;
use App\SoldierVacations;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

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

        return view('soldier_identity.index', compact('soldiers'));
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
        try {
            $registerd_before = SoldierIdentity::where('general_number', $request->general_number)->first();
            if ($registerd_before) {
                alert('خطأ في التسجيل', 'الرقم العام مسجل من قبل', 'error');
                return redirect()->back();
            }
            if ($request['hiring_date']) {
                $request['hiring_date'] = Carbon::createFromFormat('Y-m-d', $request->hiring_date, 'Asia/Riyadh');
            }
            if ($request['decision_date']) {
                $request['decision_date'] = Carbon::createFromFormat('Y-m-d', $request->decision_date, 'Asia/Riyadh');
            }
            if ($request['enroll_date']) {
                $request['enroll_date'] = Carbon::createFromFormat('Y-m-d', $request->enroll_date, 'Asia/Riyadh');
            }
            if ($request['promotion_date']) {
                $request['promotion_date'] = Carbon::createFromFormat('Y-m-d', $request->promotion_date, 'Asia/Riyadh');
            }
            if ($request['id_date']) {
                $request['id_date'] = Carbon::createFromFormat('Y-m-d', $request->id_date, 'Asia/Riyadh');
            }
            if ($request['date_of_birth']) {
                $request['date_of_birth'] = Carbon::createFromFormat('Y-m-d', $request->date_of_birth, 'Asia/Riyadh');
            }


            $identity = SoldierIdentity::create([
                'first_name' => $request->first_name,
                'father_name' => $request->father_name,
                'grandfather_name' => $request->grandfather_name,
                'family_name' => $request->family_name,
                'rank_id' => $request->rank_id,
                'general_number' => $request->general_number,
                'power_id' => $request->power_id ?? 0,
                'unit' => $request->unit,
                'region_id' => $request->region_id,
                'hiring_date' => $request->hiring_date,
                'decision_number' => $request->decision_number,
                'decision_date' => $request->decision_date,
                'decision_side' => $request->decision_side,
                'specialization' => $request->specialization,
                'weapon' => $request->weapon,
                'enroll_date' => $request->enroll_date,
                'promotion_date' => $request->promotion_date,
                'installed_job' => $request->installed_job,
                'worked_job' => $request->worked_job,
                'id_number' => $request->id_number,
                'id_source' => $request->id_source,
                'graduate_side' => $request->graduate_side,
                'place_of_birth' => $request->place_of_birth,
                'external_city' => $request->external_city,
                'date_of_birth' => $request->date_of_birth,
                'place_of_origin' => $request->place_of_origin,
                'social_status' => $request->social_status,
                'current_address' => $request->current_address,
                'home_phone' => $request->home_phone,
                'mobile_phone' => $request->mobile_phone,
                'medical_status' => $request->medical_status,
                'created_by' => Auth::user()->name,
                'last_update_by' => Auth::user()->name,
                'nofoos_save' => $request->medical_status
            ]);

            if (count($request->relatives)) {
                foreach ($request->relatives as $relative) {
                    if (isset($relative['relative_date_of_birth']) && $relative['relative_date_of_birth']) {
                        $relative['relative_date_of_birth'] = Carbon::createFromFormat('Y-m-d', $relative['relative_date_of_birth'], 'Asia/Riyadh');
                    }
                    SoldierRelatives::create([
                        'form_id' => 0,
                        'soldier_id' => $identity->id,
                        'relative_name' => $relative['relative_name'],
                        'relative_type' => $relative['relative_type'],
                        'original_nationality' => $relative['original_nationality'],
                        'current_nationality' => $relative['current_nationality'],
                        'relative_place_of_origin' => $relative['relative_place_of_origin'],
                        'relative_place_of_birth' => $relative['relative_place_of_birth'],
                        'relative_date_of_birth' => $relative['relative_date_of_birth']
                    ]);
                }
            }
            if (count($request->qualifications)) {
                foreach ($request->qualifications as $qualification) {
                    if (isset($qualification['soldier_graduation_date']) && $qualification['soldier_graduation_date']) {
                        $qualification['soldier_graduation_date'] = Carbon::createFromFormat('Y-m-d', $qualification['soldier_graduation_date'], 'Asia/Riyadh');
                    }
                    SoldierQualifications::create([
                        'form_id' => 0,
                        'soldier_id' => $identity->id,
                        'soldier_level' => $qualification['soldier_level'],
                        'soldier_specialization' => $qualification['soldier_specialization'],
                        'soldier_educational_place_name' => $qualification['soldier_educational_place_name'],
                        'soldier_educational_place' => $qualification['soldier_educational_place'],
                        'soldier_graduation_date' => $qualification['soldier_graduation_date'],
                    ]);
                }
            }

            if (count($request->sons)) {
                foreach ($request->sons as $son) {
                    if ($son['soldier_son_date_of_birth']) {
                        $son['soldier_son_date_of_birth'] = Carbon::createFromFormat('Y-m-d', $son['soldier_son_date_of_birth'], 'Asia/Riyadh');
                    }
                    SoldierSons::create([
                        'form_id' => 0,
                        'soldier_id' => $identity->id,
                        'soldier_son_name' => $son['soldier_son_name'],
                        'soldier_son_date_of_birth' => $son['soldier_son_date_of_birth'],
                    ]);
                }
            }

            if (count($request->course)) {
                foreach ($request->course as $course) {
                    if ($course['graduation_date']) {
                        $course['graduation_date'] = Carbon::createFromFormat('Y-m-d', $course['graduation_date'], 'Asia/Riyadh');
                    }
                    SoldierCourses::create([
                        'form_id' => 0,
                        'soldier_id' => $identity->id,
                        'course_name' => $course['course_name'],
                        'course_time_frame' => $course['course_time_frame'],
                        'course_place' => $course['course_place'],
                        'graduation_date' => $course['graduation_date'],
                        'course_grade' => $course['course_grade'],
                    ]);
                }
            }

            if (count($request->jobs)) {
                foreach ($request->jobs as $job) {
                    if ($job['consider_from']) {
                        $job['consider_from'] = Carbon::createFromFormat('Y-m-d', $job['consider_from'], 'Asia/Riyadh');
                    }

                    SoldierJobs::create([
                        'form_id' => 0,
                        'soldier_id' => $identity->id,
                        'job_name' => $job['job_name'],
                        'soldier_job_unit' => $job['soldier_job_unit'],
                        'consider_from' => $job['consider_from'],
                    ]);
                }
            }

            if (count($request->vacations)) {

                foreach ($request->vacations as $vacation) {
                    if ($vacation['vacation_end_date']) {
                        $vacation['vacation_end_date'] = Carbon::createFromFormat('Y-m-d', $vacation['vacation_end_date'], 'Asia/Riyadh');
                    }
                    SoldierVacations::create([
                        'form_id' => 0,
                        'soldier_id' => $identity->id,
                        'vacation_type' => $vacation['vacation_type'],
                        'vacation_period' => $vacation['vacation_period'],
                        'vacation_place' => $vacation['vacation_place'],
                        'vacation_end_date' => $vacation['vacation_end_date'],
                    ]);
                }
            }

            alert()->success('هوية فرد', 'تم حفظ الجندي بنجاح');

            return redirect()->route('identity.index');
        } catch (QueryException $e) {
            alert()->error('هوية فرد', ' لم يتم حفظ البيانات بالشكل الصحيح يرجى التحقق من الرقم العام');
            return redirect()->back();
        }
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
        if (Auth::user()->hasRole(1) || Auth::user()->hasRole(4)) {
            $soldier = SoldierIdentity::find($id);
            return view('soldier_identity.edit', compact('soldier'));
        }
        return view('not-authorize');

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
        try {
            if ($request['hiring_date']) {
                $request['hiring_date'] = Carbon::createFromFormat('Y-m-d', $request->hiring_date, 'Asia/Riyadh');
            }
            if ($request['decision_date']) {
                $request['decision_date'] = Carbon::createFromFormat('Y-m-d', $request->decision_date, 'Asia/Riyadh');
            }
            if ($request['enroll_date']) {
                $request['enroll_date'] = Carbon::createFromFormat('Y-m-d', $request->enroll_date, 'Asia/Riyadh');
            }
            if ($request['promotion_date']) {
                $request['promotion_date'] = Carbon::createFromFormat('Y-m-d', $request->promotion_date, 'Asia/Riyadh');
            }
            if ($request['id_date']) {
                $request['id_date'] = Carbon::createFromFormat('Y-m-d', $request->id_date, 'Asia/Riyadh');
            }
            if ($request['date_of_birth']) {
                $request['date_of_birth'] = Carbon::createFromFormat('Y-m-d', $request->date_of_birth, 'Asia/Riyadh');
            }
            $soldierIdentity = SoldierIdentity::find($id);
            $soldierIdentity->update($request->all());
            $soldierIdentity->created_by = Auth::user()->name;
            $soldierIdentity->last_update_by = Auth::user()->name;
            $soldierIdentity->save();

            $soldierIdentity->languages()->delete();
            if (count($request->languages)) {
                foreach ($request->languages as $language) {
                    SoldierLanguages::create([
                        'form_id' => 0,
                        'soldier_id' => $soldierIdentity->id,
                        'language_id' => $language,
                    ]);
                }
            }
            $soldierIdentity->relatives()->delete();
            if (count($request->relatives)) {
                foreach ($request->relatives as $relative) {
                    if ($relative['relative_date_of_birth']) {
                        $relative['relative_date_of_birth'] = Carbon::createFromFormat('Y-m-d', $relative['relative_date_of_birth'], 'Asia/Riyadh');
                    }
                    SoldierRelatives::create([
                        'form_id' => 0,
                        'soldier_id' => $soldierIdentity->id,
                        'relative_name' => $relative['relative_name'],
                        'relative_type' => $relative['relative_type'],
                        'original_nationality' => $relative['original_nationality'],
                        'current_nationality' => $relative['current_nationality'],
                        'relative_place_of_origin' => $relative['relative_place_of_origin'],
                        'relative_place_of_birth' => $relative['relative_place_of_birth'],
                        'relative_date_of_birth' => $relative['relative_date_of_birth']
                    ]);

                }

            }

            $soldierIdentity->qualifications()->delete();
            if (count($request->qualifications)) {
                foreach ($request->qualifications as $qualification) {
                    if ($qualification['soldier_graduation_date']) {
                        $qualification['soldier_graduation_date'] = Carbon::createFromFormat('Y-m-d', $qualification['soldier_graduation_date'], 'Asia/Riyadh');
                    }

                    SoldierQualifications::create([
                        'form_id' => 0,
                        'soldier_id' => $soldierIdentity->id,
                        'soldier_level' => $qualification['soldier_level'],
                        'soldier_specialization' => $qualification['soldier_specialization'],
                        'soldier_educational_place_name' => $qualification['soldier_educational_place_name'],
                        'soldier_educational_place' => $qualification['soldier_educational_place'],
                        'soldier_graduation_date' => $qualification['soldier_graduation_date'],
                    ]);
                }
            }

            $soldierIdentity->sons()->delete();
            if (count($request->sons)) {
                foreach ($request->sons as $son) {
                    if ($son['soldier_son_date_of_birth']) {
                        $son['soldier_son_date_of_birth'] = Carbon::createFromFormat('Y-m-d', $son['soldier_son_date_of_birth'], 'Asia/Riyadh');
                    }

                    SoldierSons::create([
                        'form_id' => 0,
                        'soldier_id' => $soldierIdentity->id,
                        'soldier_son_name' => $son['soldier_son_name'],
                        'soldier_son_date_of_birth' => $son['soldier_son_date_of_birth'],
                    ]);
                }
            }

            $soldierIdentity->courses()->delete();
            if (count($request->course)) {
                foreach ($request->course as $course) {
                    if ($course['graduation_date']) {
                        $course['graduation_date'] = Carbon::createFromFormat('Y-m-d', $course['graduation_date'], 'Asia/Riyadh');
                    }

                    SoldierCourses::create([
                        'form_id' => 0,
                        'soldier_id' => $soldierIdentity->id,
                        'course_name' => $course['course_name'],
                        'course_time_frame' => $course['course_time_frame'],
                        'course_place' => $course['course_place'],
                        'graduation_date' => $course['graduation_date'],
                        'course_grade' => $course['course_grade'],
                    ]);
                }
            }

            $soldierIdentity->jobs()->delete();
            if (count($request->jobs)) {
                foreach ($request->jobs as $job) {
                    if ($job['consider_from']) {
                        $job['consider_from'] = Carbon::createFromFormat('Y-m-d', $job['consider_from'], 'Asia/Riyadh');
                    }

                    SoldierJobs::create([
                        'form_id' => 0,
                        'soldier_id' => $soldierIdentity->id,
                        'job_name' => $job['job_name'],
                        'soldier_job_unit' => $job['soldier_job_unit'],
                        'consider_from' => $job['consider_from'],
                    ]);
                }
            }

            $soldierIdentity->vacations()->delete();
            if (count($request->vacations)) {
                foreach ($request->vacations as $vacation) {
                    if ($vacation['vacation_end_date']) {
                        $vacation['vacation_end_date'] = Carbon::createFromFormat('Y-m-d', $vacation['vacation_end_date'], 'Asia/Riyadh');
                    }

                    SoldierVacations::create([
                        'form_id' => 0,
                        'soldier_id' => $soldierIdentity->id,
                        'vacation_type' => $vacation['vacation_type'],
                        'vacation_period' => $vacation['vacation_period'],
                        'vacation_place' => $vacation['vacation_place'],
                        'vacation_end_date' => $vacation['vacation_end_date'],
                    ]);
                }
            }

            alert()->success('هوية فرد', 'تم حفظ البيانات بنجاح');

            return redirect()->route('identity.index');
        } catch (QueryException $e) {
            alert()->error('هوية فرد', ' لم يتم حفظ البيانات بالشكل الصحيح يرجى التحقق من الرقم العام');
            return redirect()->back();
        }

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
        if ($soldierIdentity->sons()) {
            $soldierIdentity->sons()->delete();
        }
        if ($soldierIdentity->courses()) {
            $soldierIdentity->courses()->delete();
        }

        if ($soldierIdentity->jobs()) {
            $soldierIdentity->jobs()->delete();
        }
        if ($soldierIdentity->relatives()) {
            $soldierIdentity->relatives()->delete();
        }
        if ($soldierIdentity->qualifications()) {
            $soldierIdentity->qualifications()->delete();
        }
        if ($soldierIdentity->vacations()) {
            $soldierIdentity->vacations()->delete();
        }

        $soldierIdentity->delete();

        return redirect()->route('identity.index');
    }

    function print(SoldierIdentity $identity)
    {
        return view('print.soldier_identity.index', compact('identity'));
    }

    function printAll()
    {
        $soldiers = SoldierIdentity::all();
        return view('print.soldier_identity.all_identities', compact('soldiers'));
    }

}
