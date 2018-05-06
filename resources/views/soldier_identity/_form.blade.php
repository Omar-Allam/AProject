@include('soldier_identity._partials.basic')
<hr>
@include('soldier_identity._partials.relatives')
<hr>
@include('soldier_identity._partials.qualifications')
<hr>
<div class="row">
    <div class="col-md-6">
        @include('soldier_identity._partials.sons')
    </div>
    <div class="col-md-6"></div>
</div>
<br>
<hr>
<div class="row">
    <div class="form-group col-md-2">
        <p><b>اللغات التي يجيدها</b></p>
        {{Form::label('languages', 'إنجليزي', ['class' => 'control-label'])}}
        <input type="checkbox" name="languages[]" value="1"
               @if((isset($soldier) && $soldier->languages->where('language_id',1)->first())) checked @endif>
        @if ($errors->has('languages'))
            <div class="error-message">{{$errors->first('languages')}}</div>
        @endif

        {{Form::label('languages', 'فرنسي', ['class' => 'control-label'])}}
        <input type="checkbox" name="languages[]" value="2"
               @if((isset($soldier) && $soldier->languages->where('language_id',2)->first())) checked @endif>
        @if ($errors->has('languages'))
            <div class="error-message">{{$errors->first('languages')}}</div>
        @endif

        {{Form::label('languages', 'أخرى', ['class' => 'control-label'])}}
        <input type="checkbox" name="languages[]" value="3"
               @if((isset($soldier) && $soldier->languages->where('language_id',3)->first())) checked @endif>
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

<div class="row">
    <div class="form-group  col-md-12 {{$errors->has('exeption_promotions')? 'has-error' : ''}}">
        {{Form::label('exeption_promotions', 'الأقدمية والترقيات الاستثنائية', ['class' => 'control-label'])}}
        {{Form::text('exeption_promotions',null, ['class' => 'form-control'])}}
        @if ($errors->has('exeption_promotions'))
            <div class="error-message">{{$errors->first('exeption_promotions')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-12 {{$errors->has('medals')? 'has-error' : ''}}">
    {{Form::label('medals', 'الأوسمة والميداليات التي منحت له', ['class' => 'control-label'])}}
        {{Form::text('medals',null, ['class' => 'form-control'])}}
        @if ($errors->has('medals'))
            <div class="error-message">{{$errors->first('medals')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-12 {{$errors->has('army_decision')? 'has-error' : ''}}">
    {{Form::label('army_decision', 'القرارات العسكرية التي صدرت بحقه', ['class' => 'control-label'])}}
        {{Form::text('issued_decisions',null, ['class' => 'form-control'])}}
        @if ($errors->has('army_decision'))
            <div class="error-message">{{$errors->first('army_decision')}}</div>
        @endif
    </div>

    <div class="form-group  col-md-12 {{$errors->has('vacations_and_places')? 'has-error' : ''}}">
    {{Form::label('vacations_and_places', 'الإجازات التي حصل عليها وأماكن قضائها', ['class' => 'control-label'])}}
        {{Form::text('vacations_and_places',null, ['class' => 'form-control'])}}
        @if ($errors->has('vacations_and_places'))
            <div class="error-message">{{$errors->first('vacations_and_places')}}</div>
        @endif
    </div>
</div>

@include('soldier_identity._partials.vacations')

<hr>

<h4>تقارير الكفاءة السنوية</h4>

<table class="table table-striped" id="vacations-and-places-table">
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
                {{Form::text('annual_year',null, ['class' => 'form-control'])}}
            </td>

            <td>
                {{Form::text('annual_personal_adj',null, ['class' => 'form-control'])}}
            </td>

            <td>
                {{Form::text('annual_performance',null, ['class' => 'form-control'])}}
            </td>
        </tr>
    </tbody>
</table>


<br><br>
<div class="row">
    <div class="form-group">
        <button class="btn btn-lg btn-info" type="submit"><i class="fa fa-save"></i> حفظ</button>
    </div>
</div>



