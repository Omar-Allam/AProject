@if(isset($soldier) && $soldier->vacations)
    <br>
    <p><b>الإجازات التي حصل عليها وأماكن قضائها</b></p>
    <table class="table table-striped" id="vactions-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('vacation_type', 'نوعها', ['class' => 'control-label'])}}
            </td>

            <td>
                {{Form::label('vacation_period', 'مدتها', ['class' => 'control-label'])}}

            </td>
            <td>
                {{Form::label('vacation_place', 'مكان قضائها', ['class' => 'control-label'])}}
            </td>

            <td>
                {{Form::label('vacation_end_date', 'تاريخ الإنفكاك', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>
        @foreach($soldier->vacations as $key=>$vacation)
            <tr>
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{Form::text('vacations['.$key.'][vacation_type]',$vacation->vacation_type ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::text('vacations['.$key.'][vacation_period]',$vacation->vacation_period ?? '', ['class' => 'form-control'])}}
                </td>

                <td>
                    {{Form::text('vacations['.$key.'][vacation_place]',$vacation->vacation_period ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::date('vacations['.$key.'][vacation_end_date]',$vacation->vacation_end_date ?? '', ['class' => 'form-control'])}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="btn-group">
        <button id="vacations" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>

    <div class="btn-group">
        <button id="remove-job" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
    </div>
@else
    <p><b>الإجازات التي حصل عليها وأماكن قضائها</b></p>
    <table class="table table-striped" id="vactions-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('vacation_type', 'نوعها', ['class' => 'control-label'])}}
            </td>

            <td>
                {{Form::label('vacation_period', 'مدتها', ['class' => 'control-label'])}}

            </td>
            <td>
                {{Form::label('vacation_place', 'مكان قضائها', ['class' => 'control-label'])}}
            </td>

            <td>
                {{Form::label('vacation_end_date', 'تاريخ الإنفكاك', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>
            <tr>
                <td>
                    1
                </td>
                <td>
                    {{Form::text('vacations[0][vacation_type]',null, ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::text('vacations[0][vacation_period]',null, ['class' => 'form-control'])}}
                </td>

                <td>
                    {{Form::text('vacations[0][vacation_place]',null, ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::date('vacations[0][vacation_end_date]',null, ['class' => 'form-control'])}}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="btn-group">
        <button id="vacations" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>

    <div class="btn-group">
        <button id="remove-vacations" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
    </div>
@endif



@section('scripts')
    <script>
        var vaca_counter = 1
        var vaca_count = 0
        $('button#vacations').click(function () {
            vaca_counter++
            vaca_count++
            $('table#vactions-table tr:last').after(`
<tr>
<td>
                <p>` + ((vaca_counter)) + `</p>
</td>
<td>
                <input type="text" name="vacations[` + vaca_count + `][vacation_type]"  class="form-control">

</td>
<td>
                <input type="text" name="vacations[` + vaca_count + `][vacation_period]"  class="form-control">
</td>

<td>
                <input type="text" name="vacations[` + vaca_count + `][vacation_place]"  class="form-control">
</td>
<td>
                <input type="date" name="vacations[` + vaca_count + `][vacation_end_date]"  class="form-control">
                </td>
   </tr>  `)
        });

        $('button#remove-vacations').click(function () {
            if ($("table#vactions-table tbody tr").length > 1) {
                $('table#vactions-table tr:last').remove()
                vaca_counter--
                vaca_count--
            }
        });
    </script>
@append