<div class="row">
    {{csrf_field()}}
    <div class="form-group col-md-2 {{$errors->has('first_name')? 'has-error' : ''}}">
        {{Form::label('first_name', ' الاسم الأول', ['class' => 'control-label'])}}
        {{Form::text('first_name', null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('first_name'))
            <div class="error-message">{{$errors->first('first_name')}}</div>
        @endif
    </div>

    <div class="form-group col-md-2 {{$errors->has('father_name')? 'has-error' : ''}}">
        {{Form::label('father_name', 'إسم الأب', ['class' => 'control-label'])}}
        {{Form::text('father_name', null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('father_name'))
            <div class="error-message">{{$errors->first('father_name')}}</div>
        @endif
    </div>

    <div class="form-group col-md-2 {{$errors->has('grandfather_name')? 'has-error' : ''}}">
        {{Form::label('grandfather_name', 'إسم الجد', ['class' => 'control-label'])}}
        {{Form::text('grandfather_name', null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('grandfather_name'))
            <div class="error-message">{{$errors->first('grandfather_name')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('family_name')? 'has-error' : ''}}">
        {{Form::label('family_name', 'إسم العائلة / القبيلة', ['class' => 'control-label'])}}
        {{Form::text('family_name', null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('family_name'))
            <div class="error-message">{{$errors->first('family_name')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('rank_id')? 'has-error' : ''}}">
        {{Form::label('rank_id', 'الرتبة', ['class' => 'control-label'])}}
        {{Form::select('rank_id', \App\SoldierRate::all()->pluck('name'),null,['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('rank_id'))
            <div class="error-message">{{$errors->first('rank_id')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('general_number')? 'has-error' : ''}}">
        {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
        {{Form::text('general_number', null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('general_number'))
            <div class="error-message">{{$errors->first('general_number')}}</div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group  col-md-4 {{$errors->has('power_id')? 'has-error' : ''}}">
        <p><b>القوة</b></p>
        {{Form::label('power_id', 'برية', ['class' => 'control-label'])}}
        {{Form::radio('power_id', 0, ['class' => 'form-control'])}}
        @if ($errors->has('power_id'))
            <div class="error-message">{{$errors->first('power_id')}}</div>
        @endif

        {{Form::label('power_id', 'بحرية', ['class' => 'control-label'])}}
        {{Form::radio('power_id', 1, ['class' => 'form-control'])}}
        @if ($errors->has('power_id'))
            <div class="error-message">{{$errors->first('power_id')}}</div>
        @endif

        {{Form::label('power_id', 'جوية', ['class' => 'control-label'])}}
        {{Form::radio('power_id', 2, ['class' => 'form-control'])}}
        @if ($errors->has('power_id'))
            <div class="error-message">{{$errors->first('power_id')}}</div>
        @endif

        {{Form::label('power_id', 'دفاع جوي', ['class' => 'control-label'])}}
        {{Form::radio('power_id', 3, ['class' => 'form-control'])}}
        @if ($errors->has('power_id'))
            <div class="error-message">{{$errors->first('power_id')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-4 {{$errors->has('unit')? 'has-error' : ''}}">
        {{Form::label('unit', 'الوحدة', ['class' => 'control-label'])}}
        {{Form::text('unit', null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('unit'))
            <div class="error-message">{{$errors->first('unit')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-4 {{$errors->has('region_id')? 'has-error' : ''}}">
        {{Form::label('region_id', 'المنطقة', ['class' => 'control-label'])}}
        {{Form::select('region_id', \App\Regions::all()->pluck('name'),null, ['class' => 'form-control'])}}
        @if ($errors->has('region_id'))
            <div class="error-message">{{$errors->first('region_id')}}</div>
        @endif
    </div>
</div>
<div class="row">

    <div class="form-group  col-md-4 {{$errors->has('hiring_date')? 'has-error' : ''}}">
        {{Form::label('hiring_date', 'تاريخ التخرج / التعيين', ['class' => 'control-label'])}}
        <input type="text" name="hiring_date" class="form-control datetimepicker2" id='datetimepicker2' value="{{$soldier->hiring_date ?? ''}}"/>
        @if ($errors->has('hiring_date'))
            <div class="error-message">{{$errors->first('hiring_date')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('decision_number')? 'has-error' : ''}}">
        {{Form::label('decision_number', 'رقم القرار', ['class' => 'control-label'])}}
        {{Form::text('decision_number',null, ['class' => 'form-control'])}}
        @if ($errors->has('decision_number'))
            <div class="error-message">{{$errors->first('decision_number')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-4 {{$errors->has('decision_date')? 'has-error' : ''}}">
        {{Form::label('decision_date', 'تاريخه', ['class' => 'control-label'])}}
        <input type="text" name="decision_date" class="form-control datetimepicker2" id='datetimepicker2'  value="{{$soldier->decision_date ?? ''}}"/>
        @if ($errors->has('decision_date'))
            <div class="error-message">{{$errors->first('decision_date')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('decision_side')? 'has-error' : ''}}">
        {{Form::label('decision_side', 'جهته', ['class' => 'control-label'])}}
        {{Form::text('decision_side',null, ['class' => 'form-control'])}}
        @if ($errors->has('decision_side'))
            <div class="error-message">{{$errors->first('decision_side')}}</div>
        @endif
    </div>

</div>
<div class="row">

    <div class="form-group  col-md-2 {{$errors->has('specialization')? 'has-error' : ''}}">
        {{Form::label('specialization', ' التخصص', ['class' => 'control-label'])}}
        {{Form::select('specialization',\App\Specialization::all()->pluck('name')->prepend('اختار التخصص'),null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('specialization'))
            <div class="error-message">{{$errors->first('specialization')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('weapon')? 'has-error' : ''}}">
        {{Form::label('weapon', ' السلاح', ['class' => 'control-label'])}}
        {{Form::text('weapon',null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('weapon'))
            <div class="error-message">{{$errors->first('weapon')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-4 {{$errors->has('enroll_date')? 'has-error' : ''}}">
        {{Form::label('enroll_date', 'تاريخ الإلتحاق بالخدمة', ['class' => 'control-label'])}}
        <input type="text" name="enroll_date" class="form-control datetimepicker2" id='datetimepicker2'  value="{{$soldier->enroll_date ?? ''}}" required/>
        @if ($errors->has('enroll_date'))
            <div class="error-message">{{$errors->first('enroll_date')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-4 {{$errors->has('promotion_date')? 'has-error' : ''}}">
        {{Form::label('promotion_date', 'تاريخ الترقية', ['class' => 'control-label'])}}
        <input type="text" name="promotion_date" class="form-control datetimepicker2" id='datetimepicker2'  value="{{$soldier->promotion_date ?? ''}}" required/>
        @if ($errors->has('promotion_date'))
            <div class="error-message">{{$errors->first('promotion_date')}}</div>
        @endif
    </div>

</div>

<div class="row">

    <div class="form-group  col-md-4 {{$errors->has('installed_job')? 'has-error' : ''}}">
        {{Form::label('installed_job', 'الوظيفة المثبت عليها', ['class' => 'control-label'])}}
        {{Form::text('installed_job',null, ['class' => 'form-control'])}}
        @if ($errors->has('installed_job'))
            <div class="error-message">{{$errors->first('installed_job')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-4 {{$errors->has('worked_job')? 'has-error' : ''}}">
        {{Form::label('worked_job', 'الوظيفة التي يعمل بها', ['class' => 'control-label'])}}
        {{Form::text('worked_job',null, ['class' => 'form-control'])}}
        @if ($errors->has('worked_job'))
            <div class="error-message">{{$errors->first('worked_job')}}</div>
        @endif
    </div>

</div>

<div class="row">
    <div class="form-group  col-md-3 {{$errors->has('id_number')? 'has-error' : ''}}">
        {{Form::label('id_number', 'رقم بطاقة الهوية الوطنية', ['class' => 'control-label'])}}
        {{Form::text('id_number',null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('id_number'))
            <div class="error-message">{{$errors->first('id_number')}}</div>
        @endif
    </div>
    <div class="form-group  col-md-3 {{$errors->has('id_source')? 'has-error' : ''}}">
        {{Form::label('id_source', 'مصدرها', ['class' => 'control-label'])}}
        {{Form::text('id_source',null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('id_source'))
            <div class="error-message">{{$errors->first('id_source')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('id_date')? 'has-error' : ''}}">
        {{Form::label('id_date', 'تاريخها', ['class' => 'control-label'])}}
        <input type="text" name="id_date" class="form-control datetimepicker2" id='datetimepicker2'  value="{{$soldier->id_date ?? ''}}" required/>
        @if ($errors->has('id_date'))
            <div class="error-message">{{$errors->first('id_date')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('graduate_side')? 'has-error' : ''}}">
        {{Form::label('graduate_side', 'جهة التخرج', ['class' => 'control-label'])}}
        {{Form::text('graduate_side',null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('graduate_side'))
            <div class="error-message">{{$errors->first('graduate_side')}}</div>
        @endif
    </div>
</div>


<div class="row">
    <div class="form-group  col-md-3 {{$errors->has('place_of_birth')? 'has-error' : ''}}">
        {{Form::label('place_of_birth', 'مكان الميلاد ( المدينة )', ['class' => 'control-label'])}}
        {{Form::text('place_of_birth',null, ['class' => 'form-control','required'=>'required'])}}
        @if ($errors->has('place_of_birth'))
            <div class="error-message">{{$errors->first('place_of_birth')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('external_city')? 'has-error' : ''}}">
        {{Form::label('external_city', 'الدولة إذا كان خارج المملكة', ['class' => 'control-label'])}}
        {{Form::text('external_city',null, ['class' => 'form-control'])}}
        @if ($errors->has('external_city'))
            <div class="error-message">{{$errors->first('external_city')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('date_of_birth')? 'has-error' : ''}}">
        {{Form::label('date_of_birth', 'تاريخ الميلاد', ['class' => 'control-label'])}}
        <input type="text" name="date_of_birth" class="form-control datetimepicker2" id='datetimepicker2'  value="{{$soldier->date_of_birth ?? ''}}" required/>
        @if ($errors->has('date_of_birth'))
            <div class="error-message">{{$errors->first('date_of_birth')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('place_of_origin')? 'has-error' : ''}}">
        {{Form::label('place_of_origin', 'مكان المنشأ', ['class' => 'control-label'])}}
        {{Form::text('place_of_origin',null, ['class' => 'form-control'])}}
        @if ($errors->has('place_of_origin'))
            <div class="error-message">{{$errors->first('place_of_origin')}}</div>
        @endif
    </div>
</div>

<div class="row">
    <div class="form-group  col-md-3 {{$errors->has('social_status')? 'has-error' : ''}}">
        <p><b>الحالة الإجتماعية</b></p>
        {{Form::label('social_status', 'متزوج', ['class' => 'control-label'])}}
        {{Form::radio('social_status', 0, ['class' => 'form-control'])}}
        @if ($errors->has('social_status'))
            <div class="error-message">{{$errors->first('social_status')}}</div>
        @endif

        {{Form::label('social_status', 'أعزب', ['class' => 'control-label'])}}
        {{Form::radio('social_status', 1, ['class' => 'form-control'])}}
        @if ($errors->has('social_status'))
            <div class="error-message">{{$errors->first('social_status')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('current_address')? 'has-error' : ''}}">
        {{Form::label('current_address', 'عنوان السكن الحالي', ['class' => 'control-label'])}}
        {{Form::text('current_address',null, ['class' => 'form-control'])}}
        @if ($errors->has('current_address'))
            <div class="error-message">{{$errors->first('current_address')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('home_phone')? 'has-error' : ''}}">
        {{Form::label('home_phone', 'رقم هاتف المنزل', ['class' => 'control-label'])}}
        {{Form::text('home_phone',null, ['class' => 'form-control'])}}
        @if ($errors->has('home_phone'))
            <div class="error-message">{{$errors->first('home_phone')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-3 {{$errors->has('mobile_phone')? 'has-error' : ''}}">
        {{Form::label('mobile_phone', 'رقم الجوال', ['class' => 'control-label'])}}
        {{Form::text('mobile_phone',null, ['class' => 'form-control'])}}
        @if ($errors->has('mobile_phone'))
            <div class="error-message">{{$errors->first('mobile_phone')}}</div>
        @endif
    </div>
</div>

