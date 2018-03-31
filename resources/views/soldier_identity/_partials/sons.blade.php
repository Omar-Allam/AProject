<div id="row-sons">
    <div class="row">
        <div class="form-group  col-md-2 {{$errors->has('soldier_son_name')? 'has-error' : ''}}">
            {{Form::label('soldier_son_name', 'اسماء الأبناء', ['class' => 'control-label'])}}
            {{Form::text('sons[0][soldier_son_name]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_son_name'))
                <div class="error-message">{{$errors->first('soldier_son_name')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('soldier_son_date_of_birth')? 'has-error' : ''}}">
            {{Form::label('soldier_son_date_of_birth', 'تاريخ الميلاد', ['class' => 'control-label'])}}
            {{Form::date('sons[0][soldier_son_date_of_birth]',null, ['class' => 'form-control'])}}
            @if ($errors->has('soldier_son_date_of_birth'))
                <div class="error-message">{{$errors->first('soldier_son_date_of_birth')}}</div>
            @endif
        </div>
    </div>
</div>
<div class="btn-group">
    <button id="sons" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>

<div class="btn-group">
    <button id="remove-sons" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>

@section('scripts')
    <script>
        var count = 0;
        $('button#sons').click(function(){
            count++;
            $('div#row-sons').append(`<div class="row">
        <div class="form-group  col-md-2 {{$errors->has('soldier_son_name')? 'has-error' : ''}}">
                <input type="text" name="sons[` + count + `][soldier_son_name]"  class="form-control">

                    @if ($errors->has('soldier_son_name'))
                <div class="error-message">{{$errors->first('soldier_son_name')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('soldier_son_date_of_birth')? 'has-error' : ''}}">
                <input type="date" name="sons[` + count + `][soldier_son_date_of_birth]"  class="form-control">
                    @if ($errors->has('soldier_son_date_of_birth'))
                <div class="error-message">{{$errors->first('soldier_son_date_of_birth')}}</div>
            @endif
                </div>
            </div>`)
        });

        $('button#remove-sons').click(function(){
            if($("div#row-sons").children().length > 1 ){
                $('div#row-sons').children().last().remove()
                count--
            }
        });
    </script>
@append