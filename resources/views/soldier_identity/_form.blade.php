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
        {{Form::label('language_id', 'إنجليزي', ['class' => 'control-label'])}}
        {{Form::checkbox('language_id[]', 'language_id', ['class' => 'form-control'])}}
        @if ($errors->has('language_id'))
            <div class="error-message">{{$errors->first('language_id')}}</div>
        @endif

        {{Form::label('language_id', 'فرنسي', ['class' => 'control-label'])}}
        {{Form::checkbox('language_id[]', 'language_id', ['class' => 'form-control'])}}
        @if ($errors->has('language_id'))
            <div class="error-message">{{$errors->first('language_id')}}</div>
        @endif

        {{Form::label('language_id', 'أخرى', ['class' => 'control-label'])}}
        {{Form::checkbox('language_id[]', 'language_id', ['class' => 'form-control'])}}
        @if ($errors->has('language_id'))
            <div class="error-message">{{$errors->first('language_id')}}</div>
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


