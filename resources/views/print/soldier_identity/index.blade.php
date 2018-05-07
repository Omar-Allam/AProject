@extends('layout.print')
@section('body')
    <br>
    <div class="row">
        <div class="col-xs-5">
            <p style="font-weight: bold;font-size: larger">القوات البرية الملكية السعودية</p>
            <p style="font-weight: bold;font-size: larger">قيادة سلاح المهندسين</p>
            <p style="font-weight: bold;font-size: larger">الإدارة</p>
        </div>
        <div class="col-xs-3" style="font-weight: bold;font-size: larger">بسم الله الرحمن الرحيم</div>
        <div class="col-xs-6"></div>
    </div>
    <br>
    {{--start-basic--}}
    <div class="row">
        {{csrf_field()}}
        <div class="form-group col-xs-2 {{$errors->has('first_name')? 'has-error' : ''}}">
            {{Form::label('first_name', ' الاسم الأول', ['class' => 'control-label'])}}
            <p>{{$identity->first_name ?? ''}}</p>

        </div>

        <div class="form-group col-xs-2 {{$errors->has('father_name')? 'has-error' : ''}}">
            {{Form::label('father_name', 'إسم الأب', ['class' => 'control-label'])}}
            <p>{{$identity->father_name ?? ''}}</p>
            @if ($errors->has('father_name'))
                <div class="error-message">{{$errors->first('father_name')}}</div>
            @endif
        </div>

        <div class="form-group col-xs-2 {{$errors->has('grandfather_name')? 'has-error' : ''}}">
            {{Form::label('grandfather_name', 'إسم الجد', ['class' => 'control-label'])}}
            <p>{{$identity->grandfather_name}}</p>
            @if ($errors->has('grandfather_name' ?? ''))
                <div class="error-message">{{$errors->first('grandfather_name')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-2 {{$errors->has('family_name')? 'has-error' : ''}}">
            {{Form::label('family_name', 'إسم العائلة / القبيلة', ['class' => 'control-label'])}}
            <p>{{$identity->family_name ?? ''}}</p>
            @if ($errors->has('family_name'))
                <div class="error-message">{{$errors->first('family_name')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-2 {{$errors->has('rank_id')? 'has-error' : ''}}">
            {{Form::label('rank_id', 'الرتبة', ['class' => 'control-label'])}}
            <p>{{$identity->rank->name ?? ''}}</p>
            @if ($errors->has('rank_id'))
                <div class="error-message">{{$errors->first('rank_id')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
            <p>{{$identity->general_number}}</p>
            @if ($errors->has('general_number'))
                <div class="error-message">{{$errors->first('general_number')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group  col-xs-4 {{$errors->has('power_id')? 'has-error' : ''}}">
            <p><b>القوة</b></p>
            @if($identity->power_id == 0)
                <p>برية</p>
            @endif

            @if($identity->power_id == 1)
                <p>بحرية</p>
            @endif

            @if($identity->power_id == 2)
                <p>جوية</p>
            @endif

            @if($identity->power_id == 3)
                <p>دفاع جوي</p>
            @endif

        </div>

        <div class="form-group  col-xs-4 {{$errors->has('unit')? 'has-error' : ''}}">
            {{Form::label('unit', 'الوحدة', ['class' => 'control-label'])}}
            <p>{{$identity->unit}}</p>
            @if ($errors->has('unit'))
                <div class="error-message">{{$errors->first('unit')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-4 {{$errors->has('region_id')? 'has-error' : ''}}">
            {{Form::label('region_id', 'المنطقة', ['class' => 'control-label'])}}
            <p>{{$identity->region->name ?? ''}}</p>

            @if ($errors->has('region_id'))
                <div class="error-message">{{$errors->first('region_id')}}</div>
            @endif
        </div>
    </div>
    <div class="row">

        <div class="form-group  col-xs-4 {{$errors->has('hiring_date')? 'has-error' : ''}}">
            {{Form::label('hiring_date', 'تاريخ التخرج / التعيين', ['class' => 'control-label'])}}
            <p>{{$identity->hiring_date ?? ''}}</p>
        </div>

        <div class="form-group  col-xs-2 {{$errors->has('decision_number')? 'has-error' : ''}}">
            {{Form::label('decision_number', 'رقم القرار', ['class' => 'control-label'])}}
            <p>{{$identity->decision_number ?? ''}}</p>
            @if ($errors->has('decision_number'))
                <div class="error-message">{{$errors->first('decision_number')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-4 {{$errors->has('decision_date')? 'has-error' : ''}}">
            {{Form::label('decision_date', 'تاريخه', ['class' => 'control-label'])}}
            <p>{{$identity->decision_date ?? ''}}</p>

            @if ($errors->has('decision_date'))
                <div class="error-message">{{$errors->first('decision_date')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-2 {{$errors->has('decision_side')? 'has-error' : ''}}">
            {{Form::label('decision_side', 'جهته', ['class' => 'control-label'])}}
            <p>{{$identity->side->name ?? ''}}</p>
            @if ($errors->has('decision_side'))
                <div class="error-message">{{$errors->first('decision_side')}}</div>
            @endif
        </div>

    </div>
    <div class="row">

        <div class="form-group  col-xs-2 {{$errors->has('specialization')? 'has-error' : ''}}">
            {{Form::label('specialization', ' التخصص', ['class' => 'control-label'])}}
            <p>{{$identity->specialization ?? ''}}</p>
            @if ($errors->has('specialization'))
                <div class="error-message">{{$errors->first('specialization')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-2 {{$errors->has('weapon')? 'has-error' : ''}}">
            {{Form::label('weapon', ' السلاح', ['class' => 'control-label'])}}
            <p>{{$identity->weapon ?? ''}}</p>
            @if ($errors->has('weapon'))
                <div class="error-message">{{$errors->first('weapon')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-4 {{$errors->has('enroll_date')? 'has-error' : ''}}">
            {{Form::label('enroll_date', 'تاريخ الإلتحاق بالخدمة', ['class' => 'control-label'])}}
            <p>{{$identity->enroll_date ?? ''}}</p>

            @if ($errors->has('enroll_date'))
                <div class="error-message">{{$errors->first('enroll_date')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('id_source')? 'has-error' : ''}}">
            {{Form::label('id_source', 'مصدرها', ['class' => 'control-label'])}}
            <p>{{$identity->id_source ?? ''}}</p>
            @if ($errors->has('id_source'))
                <div class="error-message">{{$errors->first('id_source')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('id_date')? 'has-error' : ''}}">
            {{Form::label('id_date', 'تاريخها', ['class' => 'control-label'])}}
            <p>{{$identity->id_date ?? ''}}</p>
            @if ($errors->has('id_date'))
                <div class="error-message">{{$errors->first('id_date')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('graduate_side')? 'has-error' : ''}}">
            {{Form::label('graduate_side', 'جهة التخرج', ['class' => 'control-label'])}}
            <p>{{$identity->graduate_side ?? ''}}</p>
            @if ($errors->has('graduate_side'))
                <div class="error-message">{{$errors->first('graduate_side')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group  col-xs-3 {{$errors->has('place_of_birth')? 'has-error' : ''}}">
            {{Form::label('place_of_birth', 'مكان الميلاد ( المدينة )', ['class' => 'control-label'])}}
            <p>{{$identity->place_of_birth ?? ''}}</p>
            @if ($errors->has('place_of_birth'))
                <div class="error-message">{{$errors->first('place_of_birth')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('external_city')? 'has-error' : ''}}">
            {{Form::label('external_city', 'الدولة إذا كان خارج المملكة', ['class' => 'control-label'])}}
            <p>{{$identity->external_city ?? ''}}</p>
            @if ($errors->has('external_city'))
                <div class="error-message">{{$errors->first('external_city')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('date_of_birth')? 'has-error' : ''}}">
            {{Form::label('date_of_birth', 'تاريخ الميلاد', ['class' => 'control-label'])}}
            <p>{{$identity->date_of_birth ?? ''}}</p>
            @if ($errors->has('date_of_birth'))
                <div class="error-message">{{$errors->first('date_of_birth')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('place_of_origin')? 'has-error' : ''}}">
            {{Form::label('place_of_origin', 'مكان المنشأ', ['class' => 'control-label'])}}
            <p>{{$identity->place_of_origin ?? ''}}</p>
            @if ($errors->has('place_of_origin'))
                <div class="error-message">{{$errors->first('place_of_origin')}}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group  col-xs-3 {{$errors->has('social_status')? 'has-error' : ''}}">
            <p><b>الحالة الإجتماعية</b></p>
            @if($identity->social_status == 0)
                <p>متزوج</p>
            @endif

            @if($identity->social_status == 1)
                <p>أعزب</p>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('current_address')? 'has-error' : ''}}">
            {{Form::label('current_address', 'عنوان السكن الحالي', ['class' => 'control-label'])}}
            <p>{{$identity->current_address ?? ''}}</p>
            @if ($errors->has('current_address'))
                <div class="error-message">{{$errors->first('current_address')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('home_phone')? 'has-error' : ''}}">
            {{Form::label('home_phone', 'رقم هاتف المنزل', ['class' => 'control-label'])}}
            <p>{{$identity->home_phone ?? ''}}</p>

            @if ($errors->has('home_phone'))
                <div class="error-message">{{$errors->first('home_phone')}}</div>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('mobile_phone')? 'has-error' : ''}}">
            {{Form::label('mobile_phone', 'رقم الجوال', ['class' => 'control-label'])}}
            <p>{{$identity->mobile_phone ?? ''}}</p>
            @if ($errors->has('mobile_phone'))
                <div class="error-message">{{$errors->first('mobile_phone')}}</div>
            @endif
        </div>
    </div>
    {{--end-basic--}}
    <hr>
    <br>
    {{--start-relative--}}
    @if($identity->relatives->count())
        <div class="row">
            <table class="table table-bordered" id="relatives-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('relative_name', '( الأب / الأم / الزوجات )', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_type', 'القرابة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('original_nationality', 'الجنسية الأصلية', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('current_nationality', 'الجنسية الحالية', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('relative_place_of_origin', 'المنشأ', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_place_of_birth', 'مكان الولادة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_date_of_birth', 'تاريخها', ['class' => 'control-label'])}}
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($identity->relatives as $key=>$relative)
                    <tr class="text-center">
                        <td>
                            <p>{{$relative['relative_name'] ?? ''}}</p>

                        </td>
                        <td>
                            <p>{{\App\RelativeType::find($relative['relative_type'])->name ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$relative['original_nationality'] ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$relative['current_nationality'] ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$relative['relative_place_of_origin'] ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$relative['relative_place_of_birth'] ?? ''}}</p>

                        </td>

                        <td>
                            <p>{{\Carbon\Carbon::createFromTimeString($relative->relative_date_of_birth)->format('Y-m-d') ?? ''}}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <hr>
    {{--start-relative--}}

    {{--start qualification--}}
    @if($identity->qualifications->count())
        <div class="row">
            <p><b>المؤهلات الدراسية</b></p>
            <br>
            <table class="table table-bordered" id="qualifications-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('soldier_level', 'المرحلة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_specialization', 'التخصص', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_educational_place_name', 'المؤسسة التعليمية', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_educational_place', 'مكانها', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('soldier_graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>
                @foreach($identity->qualifications as $qualification)
                    <tr class="text-center">
                        <td>
                            <p>{{\App\SoldierQualifications::$levels[$qualification['soldier_level']] ?? ''}}</p>
                        </td>

                        <td>
                            <p>{{$qualification['soldier_specialization'] ?? ''}}</p>
                        </td>

                        <td>
                            <p>{{$qualification['soldier_educational_place_name'] ?? ''}}</p>
                        </td>

                        <td>
                            <p>{{$qualification['soldier_educational_place'] ?? ''}}</p>
                        </td>

                        <td>
                            <p>{{$qualification['soldier_graduation_date'] ?? ''}}</p>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <hr>
    {{--end qualification--}}


    {{--start sons--}}
    @if($identity->sons->count())
        <div class="row">
            <p><b>الأبناء</b></p>
            <br>
            <table class="table table-bordered" id="sons-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('soldier_son_name', 'اسماء الأبناء', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_son_date_of_birth', 'تاريخ الميلاد', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>
                @foreach($identity->sons as $key=>$son)
                    <tr class="text-center">
                        <td>
                            <p>{{$son['soldier_son_name'] ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$son['soldier_son_date_of_birth'] ?? ''}}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <hr>
    {{--end-sons--}}
    @if($identity->languages->count())
        <div class="row">
            <div class="form-group col-md-2">
                <p><b>اللغات التي يجيدها</b></p>
                {{Form::label('languages', 'إنجليزي', ['class' => 'control-label'])}}
                <input type="checkbox" name="languages[]" value="1"
                       @if((isset($identity) && $identity->languages->where('language_id',1)->first())) checked @endif>
                @if ($errors->has('languages'))
                    <div class="error-message">{{$errors->first('languages')}}</div>
                @endif

                {{Form::label('languages', 'فرنسي', ['class' => 'control-label'])}}
                <input type="checkbox" name="languages[]" value="2"
                       @if((isset($identity) && $identity->languages->where('language_id',2)->first())) checked @endif>
                @if ($errors->has('languages'))
                    <div class="error-message">{{$errors->first('languages')}}</div>
                @endif

                {{Form::label('languages', 'أخرى', ['class' => 'control-label'])}}
                <input type="checkbox" name="languages[]" value="3"
                       @if((isset($identity) && $identity->languages->where('language_id',3)->first())) checked @endif>
                @if ($errors->has('languages'))
                    <div class="error-message">{{$errors->first('languages')}}</div>
                @endif
            </div>

            <div class="form-group  col-md-2 {{$errors->has('medical_status')? 'has-error' : ''}}">
                {{Form::label('medical_status', 'الحالة الصحية', ['class' => 'control-label'])}}
                <p>{{$identity['medical_status'] ?? ''}}</p>
                @if ($errors->has('medical_status'))
                    <div class="error-message">{{$errors->first('medical_status')}}</div>
                @endif
            </div>

            <div class="form-group  col-md-2 {{$errors->has('blood_type')? 'has-error' : ''}}">
                {{Form::label('blood_type', 'فصيلة الدم', ['class' => 'control-label'])}}
                <p>{{\App\BloodType::all()->pluck('name','id')->get($identity['blood_type'])}}</p>
                @if ($errors->has('blood_type'))
                    <div class="error-message">{{$errors->first('blood_type')}}</div>
                @endif
            </div>
        </div>
    @endif

    <hr>
    @if($identity->courses->count())
        <div class="row">
            <p><b>الدورات التي حصل عليها بالداخل والخارج</b></p>
            <table class="table table-bordered" id="courses-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('course_name', 'اسم الدورة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('course_time_frame', 'مدتها', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('course_place', 'مكان انعقادها', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('course_grade', 'التقدير', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>
                @foreach($identity->courses as $key=>$course)
                    <tr>
                        <td>
                            <p>{{$key+1}}</p>
                        </td>
                        <td>
                            <p>{{$course['course_name'] ?? ''}}</p>

                        </td>
                        <td>
                            <p>{{$course['course_time_frame'] ?? ''}}</p>

                        </td>
                        <td>
                            <p>{{$course['course_place'] ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$course['graduation_date'] ?? ''}}</p>

                        </td>
                        <td>
                            <p>{{\App\SoldierCourses::$grades[$course['course_grade']] ?? ''}}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    @endif

    <hr>
    @if($identity->jobs->count())
        <div class="row">
            <br>
            <p><b>الوظائف والأماكن التي عمل بها</b></p>
            <table class="table table-bordered" id="jobs-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('job_name', 'اسم الوظيفة', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('soldier_job_unit', 'الوحدة', ['class' => 'control-label'])}}

                    </td>
                    <td>
                        {{Form::label('consider_from', 'إعتبارا من', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>
                @foreach($identity->jobs as $key=>$job)
                    <tr class="text-center">
                        <td>
                            {{$key+1}}
                        </td>
                        <td>
                            <p>{{$job['job_name'] ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$job['soldier_job_unit'] ?? ''}}</p>
                        </td>
                        <td>
                            <p>{{$job['consider_from'] ?? ''}}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="row">
        <div class="form-group  col-md-12 {{$errors->has('exeption_promotions')? 'has-error' : ''}}">
            {{Form::label('exeption_promotions', 'الأقدمية والترقيات الاستثنائية', ['class' => 'control-label'])}}
            <p>{{$identity->exeption_promotions ?? ''}}</p>
            @if ($errors->has('exeption_promotions'))
                <div class="error-message">{{$errors->first('exeption_promotions')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-12 {{$errors->has('medals')? 'has-error' : ''}}">
            {{Form::label('medals', 'الأوسمة والميداليات التي منحت له', ['class' => 'control-label'])}}
            <p>{{$identity->medals ?? ''}}</p>
            @if ($errors->has('medals'))
                <div class="error-message">{{$errors->first('medals')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-12 {{$errors->has('army_decision')? 'has-error' : ''}}">
            {{Form::label('issued_decisions', 'القرارات العسكرية التي صدرت بحقه', ['class' => 'control-label'])}}
            <p>{{$identity->issued_decisions ?? ''}}</p>
            @if ($errors->has('issued_decisions'))
                <div class="error-message">{{$errors->first('army_decision')}}</div>
            @endif
        </div>


    </div>

    @if($identity->vacations->count())
        <br>
        <p><b>الإجازات التي حصل عليها وأماكن قضائها</b></p>
        <table class="table table-bordered" id="vacations-table">
            <thead>
            <tr class="text-center">
                <td>
                    {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                </td>
                <td>
                    {{Form::label('vacation_type', 'نوعها', ['class' => 'control-label'])}}
                </td>

                <td>
                    {{Form::label('vacation_period', 'مدتها', ['class' => 'control-label'])}}

                </td>
                <td>
                    {{Form::label('vacation_place', 'مكان قضائها', ['class' => 'control-label'])}}
                </td>

                <td>
                    {{Form::label('vacation_end_date', 'تاريخ الإنفكاك', ['class' => 'control-label'])}}
                </td>
            </tr>

            </thead>
            <tbody>
            @foreach($identity->vacations as $key=>$vacation)
                <tr class="text-center">
                    <td>
                        {{$key+1}}
                    </td>
                    <td>
                        <p>{{$vacation['vacation_type'] ?? ''}}</p>
                    </td>
                    <td>
                        <p>{{$vacation['vacation_period'] ?? ''}}</p>
                    </td>

                    <td>
                        <p>{{$vacation['vacation_place'] ?? ''}}</p>
                    </td>
                    <td>
                        <p>{{$vacation['vacation_end_date'] ?? ''}}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


    <hr>

    <h4>تقارير الكفاءة السنوية</h4>

    <table class="table table-bordered" id="vacations-and-places-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('annual_year', 'السنة', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('annual_personal_adj', 'صفاته الشخصية', ['class' => 'control-label'])}}
            </td>

            <td>
                {{Form::label('annual_performance', 'أداؤه في العمل', ['class' => 'control-label'])}}

            </td>

        </tr>

        </thead>
        <tbody>
        <tr>
            <td>
                <p>{{$identity['annual_year'] ?? ''}}</p>
            </td>

            <td>
                <p>{{$identity['annual_personal_adj'] ?? ''}}</p>
            </td>

            <td>
                <p>{{$identity['annual_performance'] ?? ''}}</p>
            </td>
        </tr>
        </tbody>
    </table>


    <div class="row">
        <table class="table table-condensed">
            <thead>
            <tr>
                <td>الإسم</td>
                <td>الرتبة</td>
                <td>تاريخ تعبئة النموذج</td>
                <td style="font-weight: bold;font-size: larger">التوقيع</td>
                <td style="font-weight: bold;font-size: larger">الختم</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$identity->created_by ?? ''}}</td>
                <td>{{$identity->rank->name ?? ''}}</td>
                <td>{{$identity->created_at->format('Y-m-d') ?? ''}}</td>
                <td></td>
                <td></td>
            </tr>
            </tbody>

        </table>
    </div>
@endsection

@section('scripts')
    <script>
        window.print()
    </script>
@endsection
