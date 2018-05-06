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
                    <input type="text" name="course[{{$key}}][graduation_date]" readonly class="form-control datetimepicker2" id="datetimepicker2" value="{{$course->graduation_date ?? ''}}" >

                </td>
                <td>
                    <select class="form-control" name="course[{{$key}}][course_grade]">
                        <option value="0" @if($course->course_grade == 0) selected @endif >اختر التقدير</option>
                        <option value="1" @if($course->course_grade == 1) selected @endif >ممتاز</option>
                        <option value="2" @if($course->course_grade == 2) selected @endif >جيد جدا</option>
                        <option value="3" @if($course->course_grade == 3) selected @endif >جيد</option>
                        <option value="4" @if($course->course_grade == 4) selected @endif >ضعيف</option>
                    </select>
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
        @if(isset($soldier) && $soldier->courses)
        var course_counter =
                {{$soldier->courses->count() ?? 0}}
        var course_count =
                {{$soldier->courses->count() ?? 0}}
        @else
        var course_counter = 0
        var course_count = 0
        @endif

        var id = 1;
        $('button#courses').click(function () {
            course_counter++
            $('table#courses-table  tbody:last-child').append(`
            <tr>
                <td>
                   <p>` + (course_counter) + `</p>
                </td>
                <td>
                 <input type="text" name="course[` + course_count + `][course_name]"  class="form-control" >
                </td>
                <td>
                <input type="text" name="course[` + course_count + `][course_time_frame]"  class="form-control" >
                </td>
                <td>
                 <input type="text" name="course[` + course_count + `][course_place]"  class="form-control" >
                </td>
                <td>
                 <input type="text" name="course[` + course_count + `][graduation_date]" readonly class="form-control" id="course`+id+`" >
                </td>
                <td>
                  <select class="form-control" name="course[` + course_count + `][course_grade]">
                        <option value="0"  >اختر التقدير</option>
                        <option value="1" >ممتاز</option>
                        <option value="2"  >جيد جدا</option>
                        <option value="3" >جيد</option>
                        <option value="4" >ضعيف</option>
                    </select>
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