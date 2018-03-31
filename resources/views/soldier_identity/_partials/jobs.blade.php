<div id="row-jobs">
    <div class="row">
        <br>
        <p><b>الوظائف والأماكن التي عمل بها</b></p>
        <div class="form-group  col-xs-1 {{$errors->has('name')? 'has-error' : ''}}">
            {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            <p>١</p>
        </div>
        <div class="form-group  col-md-4 {{$errors->has('job_name')? 'has-error' : ''}}">
            {{Form::label('job_name', 'اسم الوظيفة', ['class' => 'control-label'])}}
            {{Form::text('jobs[0][job_name]',null, ['class' => 'form-control'])}}
            @if ($errors->has('job_name'))
                <div class="error-message">{{$errors->first('job_name')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-4 {{$errors->has('soldier_job_unit')? 'has-error' : ''}}">
            {{Form::label('soldier_job_unit', 'الوحدة', ['class' => 'control-label'])}}
            {{Form::text('jobs[0][soldier_job_unit]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_job_unit'))
                <div class="error-message">{{$errors->first('soldier_job_unit')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-3 {{$errors->has('consider_from')? 'has-error' : ''}}">
            {{Form::label('consider_from', 'إعتبارا من', ['class' => 'control-label'])}}
            {{Form::date('jobs[0][consider_from]',null, ['class' => 'form-control'])}}
            @if ($errors->has('consider_from'))
                <div class="error-message">{{$errors->first('consider_from')}}</div>
            @endif
        </div>

    </div>
</div>
<div class="btn-group">
    <button id="jobs" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>

<div class="btn-group">
    <button id="remove-job" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>
@section('scripts')
    <script>
        var counter = 1
        var count = 0
        $('button#jobs').click(function(){
            counter++
            count++
            $('div#row-jobs').append(`<div class="row">
        <div class="form-group  col-xs-1 {{$errors->has('name')? 'has-error' : ''}}">
                <p>`+((counter.toLocaleString('ar-EG')))+`</p>
            </div>
            <div class="form-group  col-md-4 {{$errors->has('job_name')? 'has-error' : ''}}">
                <input type="text" name="jobs[` + count + `][job_name]"  class="form-control">

                    @if ($errors->has('job_name'))
                <div class="error-message">{{$errors->first('job_name')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-4 {{$errors->has('soldier_job_unit')? 'has-error' : ''}}">
                <input type="text" name="jobs[` + count + `][soldier_job_unit]"  class="form-control">

                    @if ($errors->has('soldier_job_unit'))
                <div class="error-message">{{$errors->first('soldier_job_unit')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-3 {{$errors->has('consider_from')? 'has-error' : ''}}">
                <input type="date" name="jobs[` + count + `][consider_from]"  class="form-control">

                    @if ($errors->has('consider_from'))
                <div class="error-message">{{$errors->first('consider_from')}}</div>
            @endif
                </div>

            </div>`)
        });

        $('button#remove-job').click(function(){
            if($("div#row-jobs").children().length > 1 ){
                $('div#row-jobs').children().last().remove()
                counter--
            }
        });
    </script>
@append