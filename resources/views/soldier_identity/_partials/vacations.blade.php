<div id="row-vacations">
    <div class="row">
        <br>
        <p><b>الإجازات التي حصل عليها وأماكن قضائها</b></p>
        <div class="form-group  col-xs-1 {{$errors->has('name')? 'has-error' : ''}}">
            {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            <p>١</p>
        </div>
        <div class="form-group  col-md-2 {{$errors->has('vacation_type')? 'has-error' : ''}}">
            {{Form::label('vacation_type', 'نوعها', ['class' => 'control-label'])}}
            {{Form::text('vacations[0][vacation_type]',null, ['class' => 'form-control'])}}
            @if ($errors->has('vacation_type'))
                <div class="error-message">{{$errors->first('vacation_type')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-3 {{$errors->has('vacation_period')? 'has-error' : ''}}">
            {{Form::label('vacation_period', 'مدتها', ['class' => 'control-label'])}}
            {{Form::text('vacations[0][vacation_period]',null, ['class' => 'form-control'])}}
            @if ($errors->has('vacation_period'))
                <div class="error-message">{{$errors->first('vacation_period')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-3 {{$errors->has('vacation_place')? 'has-error' : ''}}">
            {{Form::label('vacation_place', 'مكان قضائها', ['class' => 'control-label'])}}
            {{Form::text('vacations[0][vacation_place]',null, ['class' => 'form-control'])}}
            @if ($errors->has('vacation_place'))
                <div class="error-message">{{$errors->first('vacation_place')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-3 {{$errors->has('vacation_end_date')? 'has-error' : ''}}">
            {{Form::label('vacation_end_date', 'تاريخ الإنفكاك', ['class' => 'control-label'])}}
            {{Form::date('vacations[0][vacation_end_date]',null, ['class' => 'form-control'])}}
            @if ($errors->has('vacation_end_date'))
                <div class="error-message">{{$errors->first('vacation_end_date')}}</div>
            @endif
        </div>

    </div>
</div>

<div class="btn-group">
    <button id="vacations" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>

<div class="btn-group">
    <button id="remove-vacations" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>


@section('scripts')
    <script>
        var counter = 1
        var count = 0
        $('button#vacations').click(function () {
            counter++
            count++
            $('div#row-vacations').append(`
            <div class="row">
        <div class="form-group  col-xs-1 {{$errors->has('name')? 'has-error' : ''}}">
                <p>` + ((counter.toLocaleString('ar-EG'))) + `</p>
            </div>
            <div class="form-group  col-md-2 {{$errors->has('vacation_type')? 'has-error' : ''}}">
                <input type="text" name="vacations[` + count + `][vacation_type]"  class="form-control">

                    @if ($errors->has('vacation_type'))
                <div class="error-message">{{$errors->first('vacation_type')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-3 {{$errors->has('vacation_period')? 'has-error' : ''}}">
                <input type="text" name="vacations[` + count + `][vacation_period]"  class="form-control">

                    @if ($errors->has('vacation_period'))
                <div class="error-message">{{$errors->first('vacation_period')}}</div>
            @endif
                </div>

                <div class="form-group  col-md-3 {{$errors->has('vacation_place')? 'has-error' : ''}}">
                <input type="text" name="vacations[` + count + `][vacation_place]"  class="form-control">
                    @if ($errors->has('vacation_place'))
                <div class="error-message">{{$errors->first('vacation_place')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-3 {{$errors->has('vacation_end_date')? 'has-error' : ''}}">
                <input type="date" name="vacations[` + count + `][vacation_end_date]"  class="form-control">
                    @if ($errors->has('vacation_end_date'))
                <div class="error-message">{{$errors->first('vacation_end_date')}}</div>
            @endif
                </div>

            </div>
`)
        });

        $('button#remove-vacations').click(function () {
            if ($("div#row-vacations").children().length > 1) {
                $('div#row-vacations').children().last().remove()
                counter--
                count--
            }
        });
    </script>
@append