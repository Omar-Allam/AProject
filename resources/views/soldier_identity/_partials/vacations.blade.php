@if(isset($soldier) && $soldier->vacations)
    <br>
    <p><b>الإجازات التي حصل عليها وأماكن قضائها</b></p>
    <table class="table table-striped" id="vacations-table">
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
                    {{Form::text('vacations['.$key.'][vacation_place]',$vacation->vacation_place ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    <input type="text" name="vacations[{{$key}}][vacation_end_date]"  class="form-control datetimepicker2" value="{{$vacation->vacation_end_date ?? ''}}" >
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="btn-group">
        <button id="vacations" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>

    <div class="btn-group">
        <button id="remove-vacations" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
    </div>
@else
    <p><b>الإجازات التي حصل عليها وأماكن قضائها</b></p>
    <table class="table table-striped" id="vacations-table">
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
         @if(isset($soldier) && $soldier->vacations)
        var vaca_counter =
                {{$soldier->vacations->count() ?? 0}}
        var vaca_count =
                {{$soldier->vacations->count() ?? 0}}
                @else
        var vaca_counter = 0
        var vaca_count = 0
                @endif

        $('button#vacations').click(function () {
            vaca_counter++
            $('table#vacations-table tbody:last-child').append(`
<tr>
<td>
                <p>` + (vaca_counter) + `</p>
</td>
<td>
                <input type="text" name="vacations[` + vaca_count + `][vacation_type]"  class="form-control" >

</td>
<td>
                <input type="text" name="vacations[` + vaca_count + `][vacation_period]"  class="form-control" >
</td>

<td>
                <input type="text" name="vacations[` + vaca_count + `][vacation_place]"  class="form-control" >
</td>
<td>
                <input type="text" name="vacations[` + vaca_count + `][vacation_end_date]"  class="form-control" id="soldier_vacations`+id+`" >
                </td>
   </tr>  `)

            $('#soldier_vacations'+id).calendarsPicker({
                calendar: $.calendars.instance('islamic'),
                monthsToShow: [1,1],
                dateFormat: 'yyyy-mm-dd'
            });
            id++
            vaca_count++

        });

        $('button#remove-vacations').click(function () {

            if ($("table#vacations-table tbody tr").length != 0) {
                $('table#vacations-table tbody tr:last').remove()
                vaca_counter--;
                vaca_count--;
            }
        });
    </script>
@append