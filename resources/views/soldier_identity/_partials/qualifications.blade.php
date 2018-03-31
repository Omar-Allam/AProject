<div id="qualifications-container">
    <div class="row">
        <br>
        <p><b>المؤهلات الدراسية</b></p>
        <div class="form-group  col-md-2 {{$errors->has('soldier_level')? 'has-error' : ''}}">
            {{Form::label('soldier_level', 'المرحلة', ['class' => 'control-label'])}}
            {{Form::text('qualifications[0][soldier_level]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_level'))
                <div class="error-message">{{$errors->first('soldier_level')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('soldier_specialization')? 'has-error' : ''}}">
            {{Form::label('soldier_specialization', 'التخصص', ['class' => 'control-label'])}}
            {{Form::text('qualifications[0][soldier_specialization]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_specialization'))
                <div class="error-message">{{$errors->first('soldier_specialization')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-3 {{$errors->has('soldier_educational_place_name')? 'has-error' : ''}}">
            {{Form::label('soldier_educational_place_name', 'المؤسسة التعليمية', ['class' => 'control-label'])}}
            {{Form::text('qualifications[0][soldier_educational_place_name]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_educational_place_name'))
                <div class="error-message">{{$errors->first('soldier_educational_place_name')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('soldier_educational_place')? 'has-error' : ''}}">
            {{Form::label('soldier_educational_place', 'مكانها', ['class' => 'control-label'])}}
            {{Form::text('qualifications[0][soldier_educational_place]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_educational_place'))
                <div class="error-message">{{$errors->first('soldier_educational_place')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-3 {{$errors->has('soldier_graduation_date')? 'has-error' : ''}}">
            {{Form::label('soldier_graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
            {{Form::date('qualifications[0][soldier_graduation_date]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_graduation_date'))
                <div class="error-message">{{$errors->first('soldier_graduation_date')}}</div>
            @endif
        </div>

    </div>
</div>
<div class="btn-group">
    <button id="qualifications" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>
<div class="btn-group">
    <button id="remove-qualifications" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>


@section('scripts')
    <script>
        var count = 0
        $('button#qualifications').click(function(){
            count++
            $('div#qualifications-container').append(`<div class="row">
        <div class="form-group  col-md-2 {{$errors->has('soldier_level')? 'has-error' : ''}}">
                       <input type="text" name="qualifications[` + count + `][soldier_level]"  class="form-control">
                    @if ($errors->has('soldier_level'))
                <div class="error-message">{{$errors->first('soldier_level')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('soldier_specialization')? 'has-error' : ''}}">
                       <input type="text" name="qualifications[` + count + `][soldier_specialization]"  class="form-control">
                    @if ($errors->has('soldier_specialization'))
                <div class="error-message">{{$errors->first('soldier_specialization')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-3 {{$errors->has('soldier_educational_place_name')? 'has-error' : ''}}">
                       <input type="text" name="qualifications[` + count + `][soldier_educational_place_name]"  class="form-control">
                    @if ($errors->has('soldier_educational_place_name'))
                <div class="error-message">{{$errors->first('soldier_educational_place_name')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('soldier_educational_place')? 'has-error' : ''}}">
                       <input type="text" name="qualifications[` + count + `][soldier_educational_place]"  class="form-control">
                    @if ($errors->has('soldier_educational_place'))
                <div class="error-message">{{$errors->first('soldier_educational_place')}}</div>
            @endif
                </div>

                <div class="form-group  col-md-3 {{$errors->has('soldier_graduation_date')? 'has-error' : ''}}">
                       <input type="date" name="qualifications[` + count + `][soldier_graduation_date]"  class="form-control">
                    @if ($errors->has('soldier_graduation_date'))
                <div class="error-message">{{$errors->first('soldier_graduation_date')}}</div>
            @endif
                </div>

            </div>`)
        });

        $('button#remove-qualifications').click(function(){
            if($("div#qualifications-container").children().length > 1 ){
                $('div#qualifications-container').children().last().remove()
                count--
            }
        });
    </script>
@append