<div id="row-courses">
    <div class="row">
        <br>
        <p><b>الدورات التي حصل عليها بالداخل والخارج</b></p>
        <div class="form-group  col-xs-1 {{$errors->has('name')? 'has-error' : ''}}">
            {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            <p>١</p>
        </div>
        <div class="form-group  col-md-2 {{$errors->has('course_name')? 'has-error' : ''}}">
            {{Form::label('course_name', 'اسم الدورة', ['class' => 'control-label'])}}
            {{Form::text('course[0][course_name]',null, ['class' => 'form-control'])}}
            @if ($errors->has('course_name'))
                <div class="error-message">{{$errors->first('course_name')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('course_time_frame')? 'has-error' : ''}}">
            {{Form::label('course_time_frame', 'مدتها', ['class' => 'control-label'])}}
            {{Form::text('course[0][course_time_frame]',null, ['class' => 'form-control'])}}
            @if ($errors->has('course_time_frame'))
                <div class="error-message">{{$errors->first('course_time_frame')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('course_place')? 'has-error' : ''}}">
            {{Form::label('course_place', 'مكان انعقادها', ['class' => 'control-label'])}}
            {{Form::date('course[0][course_place]',null, ['class' => 'form-control'])}}
            @if ($errors->has('course_place'))
                <div class="error-message">{{$errors->first('course_place')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('graduation_date')? 'has-error' : ''}}">
            {{Form::label('graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
            {{Form::date('course[0][graduation_date]',null, ['class' => 'form-control'])}}
            @if ($errors->has('graduation_date'))
                <div class="error-message">{{$errors->first('graduation_date')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-2 {{$errors->has('course_grade')? 'has-error' : ''}}">
            {{Form::label('course_grade', 'التقدير', ['class' => 'control-label'])}}
            {{Form::text('course[0][course_grade]',null, ['class' => 'form-control'])}}
            @if ($errors->has('course_grade'))
                <div class="error-message">{{$errors->first('course_grade')}}</div>
            @endif
        </div>

    </div>
</div>
<div class="btn-group">
    <button id="courses" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>

<div class="btn-group">
    <button id="remove-course" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>

@section('scripts')
    <script>
        var counter = 1
        var count = 0
        $('button#courses').click(function(){
            counter++
            count++
            $('div#row-courses').append(`
            <div class="row">

        <div class="form-group  col-xs-1 {{$errors->has('name')? 'has-error' : ''}}">
                <p>`+((counter.toLocaleString('ar-EG')))+`</p>
            </div>
            <div class="form-group  col-md-2 {{$errors->has('course_name')? 'has-error' : ''}}">
                <input type="text" name="course[` + count + `][course_name]"  class="form-control">

                    @if ($errors->has('course_name'))
                <div class="error-message">{{$errors->first('course_name')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('course_time_frame')? 'has-error' : ''}}">
                <input type="text" name="course[` + count + `][course_time_frame]"  class="form-control">

                    @if ($errors->has('course_time_frame'))
                <div class="error-message">{{$errors->first('course_time_frame')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('course_place')? 'has-error' : ''}}">
                <input type="date" name="course[` + count + `][course_place]"  class="form-control">

                    @if ($errors->has('course_place'))
                <div class="error-message">{{$errors->first('course_place')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('graduation_date')? 'has-error' : ''}}">
                <input type="date" name="course[` + count + `][graduation_date]"  class="form-control">

                    @if ($errors->has('graduation_date'))
                <div class="error-message">{{$errors->first('graduation_date')}}</div>
            @endif
                </div>

                <div class="form-group  col-md-2 {{$errors->has('course_grade')? 'has-error' : ''}}">
                <input type="text" name="course[` + count + `][course_grade]"  class="form-control">

                    @if ($errors->has('course_grade'))
                <div class="error-message">{{$errors->first('course_grade')}}</div>
            @endif
                </div>

            </div>`)
        });

        $('button#remove-course').click(function(){
            if($("div#row-courses").children().length > 1 ){
                $('div#row-courses').children().last().remove()
                counter--;
                count--;
            }
        });
    </script>
@append