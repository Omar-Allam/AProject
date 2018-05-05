@if(isset($soldier) && $soldier->relatives)
    <div id="relatives">
        <div class="row">
            <table class="table table-striped" id="relatives-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('relative_name', '( الأب / الأم / الزوجات )', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_type', 'القرابة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('original_nationality', 'الجنسية الأصلية', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('current_nationality', 'الجنسية الحالية', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('relative_place_of_origin', 'المنشأ', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_place_of_birth', 'مكان الولادة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_date_of_birth', 'تاريخها', ['class' => 'control-label'])}}
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($soldier->relatives as $key=>$relative)
                    <tr>
                    <td>
                        {{Form::text('relatives['.$key.'][relative_name]',null, ['class' => 'form-control'])}}
                        {{Form::hidden('relatives['.$key.'][relative_id]', $relative->id , ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::select('relatives['.$key.'][relative_type]',\App\RelativeType::all()->pluck('name'),null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::text('relatives['.$key.'][original_nationality]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::text('relatives['.$key.'][current_nationality]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::text('relatives['.$key.'][relative_place_of_origin]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::text('relatives['.$key.'][relative_place_of_birth]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::date('relatives['.$key.'][relative_date_of_birth]',null, ['class' => 'form-control'])}}
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@else
    <div id="relatives">
        <div class="row">
            <table class="table table-striped" id="relatives-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('relative_name', '( الأب / الأم / الزوجات )', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_type', 'القرابة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('original_nationality', 'الجنسية الأصلية', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('current_nationality', 'الجنسية الحالية', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('relative_place_of_origin', 'المنشأ', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_place_of_birth', 'مكان الولادة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('relative_date_of_birth', 'تاريخها', ['class' => 'control-label'])}}
                    </td>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endif
<div class="btn-group">
    <button id="relatives" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>
<div class="btn-group">
    <button id="remove-relatives" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>


@section('scripts')
    <script>
        var rela_count = 0
        $('button#relatives').click(function () {
            var row = $('#row-relative')
            $('table#relatives-table tbody:last-child').append(`<tr>
                    <td>
                     <input type="text" name="relatives[` + rela_count + `][relative_name]" class="form-control" required>
                </td>
                <td>
                 <select name="relatives[` + rela_count + `][relative_type]" class="form-control">
            @foreach(\App\RelativeType::all() as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
                </select>
                </td>

                <td>
                <input type="text" name="relatives[` + rela_count + `][original_nationality]" class="form-control" required>
                </td>
                <td>
                <input type="text" name="relatives[` + rela_count + `][current_nationality]" class="form-control" required>
                </td>
                <td>
                <input type="text" name="relatives[` + rela_count + `][relative_place_of_origin]" class="form-control" required>
                </td>
                <td>
                <input type="text" name="relatives[` + rela_count + `][relative_place_of_birth]" class="form-control" required>
                </td>
                <td>
                <input type="date" name="relatives[` + rela_count + `][relative_date_of_birth]" class="form-control" required>
                </td>
                </tr>`)
            rela_count++
        });



        $('button#remove-relatives').click(function () {
            if ($("table#relatives-table tbody tr").length !== 0) {
                $('table#relatives-table tr:last').remove()
                rela_count--;
            }
        });
    </script>
@append