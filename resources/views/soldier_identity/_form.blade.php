@include('soldier_identity._partials.basic')
<hr>
@include('soldier_identity._partials.relatives')
<hr>
@include('soldier_identity._partials.qualifications')
<hr>
@include('soldier_identity._partials.sons')
<hr>
<div class="row">
    <div class="form-group col-md-2">
        <p><b>اللغات التي يجيدها</b></p>
        {{Form::label('languages', 'إنجليزي', ['class' => 'control-label'])}}
        <input type="checkbox" name="languages[]" value="1" @if((isset($soldier) && $soldier->languages->where('language_id',1)->first())) checked @endif>
        @if ($errors->has('languages'))
            <div class="error-message">{{$errors->first('languages')}}</div>
        @endif

        {{Form::label('languages', 'فرنسي', ['class' => 'control-label'])}}
        <input type="checkbox" name="languages[]" value="2" @if((isset($soldier) && $soldier->languages->where('language_id',2)->first())) checked @endif>
        @if ($errors->has('languages'))
            <div class="error-message">{{$errors->first('languages')}}</div>
        @endif

        {{Form::label('languages', 'أخرى', ['class' => 'control-label'])}}
        <input type="checkbox" name="languages[]" value="3" @if((isset($soldier) && $soldier->languages->where('language_id',3)->first())) checked @endif>
        @if ($errors->has('languages'))
            <div class="error-message">{{$errors->first('languages')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('medical_status')? 'has-error' : ''}}">
        {{Form::label('medical_status', 'الحالة الصحية', ['class' => 'control-label'])}}
        {{Form::text('medical_status',null, ['class' => 'form-control'])}}
        @if ($errors->has('medical_status'))
            <div class="error-message">{{$errors->first('medical_status')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-2 {{$errors->has('blood_type')? 'has-error' : ''}}">
        {{Form::label('blood_type', 'فصيلة الدم', ['class' => 'control-label'])}}
        {{Form::select('blood_type',\App\BloodType::all()->pluck('name'),null, ['class' => 'form-control'])}}
        @if ($errors->has('blood_type'))
            <div class="error-message">{{$errors->first('blood_type')}}</div>
        @endif
    </div>
</div>
<hr>
@include('soldier_identity._partials.courses')
<hr>
@include('soldier_identity._partials.jobs')
<hr>
@include('soldier_identity._partials.vacations')


<br><br>
<div class="row">
    <div class="form-group">
        <button class="btn btn-lg btn-info" type="submit"><i class="fa fa-save"></i> حفظ</button>
    </div>
</div>



