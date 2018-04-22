@if(isset($soldier) && $soldier->sons)
    <table class="table table-striped" id="sons-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('soldier_son_name', 'اسماء الأبناء', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('soldier_son_date_of_birth', 'تاريخ الميلاد', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>
        @foreach($soldier->sons as $key=>$son)
            <tr>
                <td>
                    {{Form::text('sons['.$key.'][soldier_son_name]',null, ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::date('sons['.$key.'][soldier_son_date_of_birth]',null, ['class' => 'form-control'])}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <table class="table table-striped" id="sons-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('soldier_son_name', 'اسماء الأبناء', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('soldier_son_date_of_birth', 'تاريخ الميلاد', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>
        <tr>
            <td>
                {{Form::text('sons[0][soldier_son_name]',null, ['class' => 'form-control'])}}
            </td>
            <td>
                {{Form::date('sons[0][soldier_son_date_of_birth]',null, ['class' => 'form-control'])}}
            </td>
        </tr>
        </tbody>
    </table>
@endif

<div class="btn-group">
    <button id="sons" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
</div>

<div class="btn-group">
    <button id="remove-sons" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
</div>

@section('scripts')
    <script>
        var son_count = 0;
        $('button#sons').click(function () {
            son_count++;
            $('table#sons-table tr:last').after(`
<tr>
<td>
                <input type="text" name="sons[` + son_count + `][soldier_son_name]"  class="form-control">

</td>
<td>
                <input type="date" name="sons[` + son_count + `][soldier_son_date_of_birth]"  class="form-control">

</td>
</tr>

               `)
        });

        $('button#remove-sons').click(function () {
            if ($("table#sons-table tbody tr").length > 1) {
                $('table#sons-table tr:last').remove()
                son_count--;
            }
        });
    </script>
@append