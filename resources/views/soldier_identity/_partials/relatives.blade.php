<div id="relatives">
    <div class="row">
        <div class="form-group  col-md-2 {{$errors->has('relative_name')? 'has-error' : ''}}">
            {{Form::label('relative_name', '( الأب / الأم / الزوجات )', ['class' => 'control-label'])}}
            {{Form::text('relatives[0][relative_name]',null, ['class' => 'form-control'])}}
            @if ($errors->has('relative_name'))
                <div class="error-message">{{$errors->first('relative_name')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-1 {{$errors->has('relative_type')? 'has-error' : ''}}">
            {{Form::label('relative_type', 'القرابة', ['class' => 'control-label'])}}
            {{Form::select('relatives[0][relative_type]',\App\RelativeType::all()->pluck('name'),null, ['class' => 'form-control'])}}
            @if ($errors->has('relative_type'))
                <div class="error-message">{{$errors->first('relative_type')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('original_nationality')? 'has-error' : ''}}">
            {{Form::label('original_nationality', 'الجنسية الأصلية', ['class' => 'control-label'])}}
            {{Form::text('relatives[0][original_nationality]',null, ['class' => 'form-control'])}}
            @if ($errors->has('original_nationality'))
                <div class="error-message">{{$errors->first('original_nationality')}}</div>
            @endif
        </div>
        <div class="form-group  col-md-2 {{$errors->has('current_nationality')? 'has-error' : ''}}">
            {{Form::label('current_nationality', 'الجنسية الحالية', ['class' => 'control-label'])}}
            {{Form::text('relatives[0][current_nationality]',null, ['class' => 'form-control'])}}
            @if ($errors->has('current_nationality'))
                <div class="error-message">{{$errors->first('current_nationality')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-1 {{$errors->has('relative_place_of_origin')? 'has-error' : ''}}">
            {{Form::label('relative_place_of_origin', 'المنشأ', ['class' => 'control-label'])}}
            {{Form::text('relatives[0][relative_place_of_origin]',null, ['class' => 'form-control'])}}
            @if ($errors->has('relative_place_of_origin'))
                <div class="error-message">{{$errors->first('relative_place_of_origin')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-2 {{$errors->has('relative_place_of_birth')? 'has-error' : ''}}">
            {{Form::label('relative_place_of_birth', 'مكان الولادة', ['class' => 'control-label'])}}
            {{Form::text('relatives[0][relative_place_of_birth]',null, ['class' => 'form-control'])}}
            @if ($errors->has('relative_place_of_birth'))
                <div class="error-message">{{$errors->first('relative_place_of_birth')}}</div>
            @endif
        </div>

        <div class="form-group  col-md-2 {{$errors->has('relative_date_of_birth')? 'has-error' : ''}}">
            {{Form::label('relative_date_of_birth', 'تاريخها', ['class' => 'control-label'])}}
            {{Form::date('relatives[0][relative_date_of_birth]',null, ['class' => 'form-control'])}}
            @if ($errors->has('relative_date_of_birth'))
                <div class="error-message">{{$errors->first('relative_date_of_birth')}}</div>
            @endif
        </div>
    </div>
</div>
<div class="btn-group">
    <button id="relatives" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>

<div class="btn-group">
    <button id="remove-relatives" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>


@section('scripts')
    <script>
        var count = 0
        $('button#relatives').click(function () {
            count++
            var row = $('#row-relative')
            $('div#relatives').append(` <div class="row">
        <div class="form-group  col-md-2 {{$errors->has('relative_name')? 'has-error' : ''}}">
                    <input type="text" name="relatives[` + count + `][relative_name]"  class="form-control">
                    @if ($errors->has('relative_name'))
                <div class="error-message">{{$errors->first('relative_name')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-1 {{$errors->has('relative_type')? 'has-error' : ''}}">
                    <select class="form-control" name="relatives[` + count + `][relative_type]">
                            @foreach(\App\RelativeType::all() as $relative)
                            <option value="{{$relative->id}}">{{$relative->name}}</option>
                            @endforeach
                    </select>
                    @if ($errors->has('relative_type'))
                <div class="error-message">{{$errors->first('relative_type')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('original_nationality')? 'has-error' : ''}}">
                <input type="text" name="relatives[` + count + `][original_nationality]"  class="form-control">
                    @if ($errors->has('original_nationality'))
                <div class="error-message">{{$errors->first('original_nationality')}}</div>
            @endif
                </div>
                <div class="form-group  col-md-2 {{$errors->has('current_nationality')? 'has-error' : ''}}">
                <input type="text" name="relatives[` + count + `][current_nationality]"  class="form-control">
                    @if ($errors->has('current_nationality'))
                <div class="error-message">{{$errors->first('current_nationality')}}</div>
            @endif
                </div>

                <div class="form-group  col-md-1 {{$errors->has('relative_place_of_origin')? 'has-error' : ''}}">
                <input type="text" name="relatives[` + count + `][relative_place_of_origin]"  class="form-control">
                    @if ($errors->has('relative_place_of_origin'))
                <div class="error-message">{{$errors->first('relative_place_of_origin')}}</div>
            @endif
                </div>

                <div class="form-group  col-md-2 {{$errors->has('relative_place_of_birth')? 'has-error' : ''}}">
                <input type="text" name="relatives[` + count + `][relative_place_of_birth]"  class="form-control">
                    @if ($errors->has('relative_place_of_birth'))
                <div class="error-message">{{$errors->first('relative_place_of_birth')}}</div>
            @endif
                </div>

                <div class="form-group  col-md-2 {{$errors->has('relative_date_of_birth')? 'has-error' : ''}}">
                <input type="date" name="relatives[` + count + `][relative_date_of_birth]"  class="form-control">
                    @if ($errors->has('relative_date_of_birth'))
                <div class="error-message">{{$errors->first('relative_date_of_birth')}}</div>
            @endif
                </div>
            </div>`)
        });


        $('button#remove-relatives').click(function () {
            if ($("div#relatives").children().length > 1) {
                $('div#relatives').children().last().remove()
                count--
            }
        });
    </script>
@append