@if(isset($soldier) && $soldier->courses)
    <p><b>الدورات التي حصل عليها بالداخل والخارج</b></p>
    <table class="table table-striped" id="courses-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_name', 'اسم الدورة', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_time_frame', 'مدتها', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_place', 'مكان انعقادها', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_grade', 'التقدير', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>
        @foreach($soldier->courses as $key=>$course)
            <tr>
                <td>
                    <p>{{$key+1}}</p>
                </td>
                <td>
                    {{Form::text('course['.$key.'][course_name]',$course->course_name ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::text('course['.$key.'][course_time_frame]',$course->course_time_frame ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::text('course['.$key.'][course_place]',$course->course_place ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    <input type="text" name="course[{{$key}}][graduation_date]"  class="form-control datetimepicker2" id="datetimepicker2" value="{{$course->graduation_date ?? ''}}" required>

                </td>
                <td>
                    {{Form::text('course['.$key.'][course_grade]',$course->course_grade ?? '', ['class' => 'form-control'])}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="btn-group">
        <button id="courses" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>

    <div class="btn-group">
        <button id="remove-course" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
    </div>
@else
    <p><b>الدورات التي حصل عليها بالداخل والخارج</b></p>
    <table class="table table-striped" id="courses-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_name', 'اسم الدورة', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_time_frame', 'مدتها', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_place', 'مكان انعقادها', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('course_grade', 'التقدير', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>

        </tbody>
    </table>

    <div class="btn-group">
        <button id="courses" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>

    <div class="btn-group">
        <button id="remove-course" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
    </div>
@endif



@section('scripts')
    <script>
        var course_counter = $('#courses-table > tbody:last > tr').length
        var course_count = 0
        var id = 1;
        $('button#courses').click(function () {
            course_counter++
            $('table#courses-table  tbody:last-child').append(`
            <tr>
                <td>
                   <p>` + (course_counter) + `</p>
                </td>
                <td>
                 <input type="text" name="course[` + course_count + `][course_name]"  class="form-control" required>
                </td>
                <td>
                <input type="text" name="course[` + course_count + `][course_time_frame]"  class="form-control" required>
                </td>
                <td>
                 <input type="text" name="course[` + course_count + `][course_place]"  class="form-control" required>
                </td>
                <td>
                 <input type="text" name="course[` + course_count + `][graduation_date]"  class="form-control" id="course`+id+`" required>
                </td>
                <td>
                <input type="text" name="course[` + course_count + `][course_grade]"  class="form-control"  required>
                </td>
            </tr>`)
            course_count++
            $('#course'+id).calendarsPicker({
                calendar: $.calendars.instance('islamic'),
                monthsToShow: [1,1],
                dateFormat: 'yyyy-mm-dd'
            });
            id++
        });

        $('button#remove-course').click(function () {
            if ($("table#courses-table tbody tr").length !== 0) {
                $('table#courses-table tr:last').remove()
                course_counter--;
                course_count--;
            }
        });
    </script>
@append