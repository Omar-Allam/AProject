@if(isset($soldier) && $soldier->qualifications)
    <div id="qualifications-container">
        <div class="row">
            <br>
            <p><b>المؤهلات الدراسية</b></p>

            <table class="table table-striped" id="qualifications-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('soldier_level', 'المرحلة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_specialization', 'التخصص', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_educational_place_name', 'المؤسسة التعليمية', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_educational_place', 'مكانها', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('soldier_graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>
                @foreach($soldier->qualifications as $key=>$qualification)
                    <tr>
                        <td>
                            <select class="form-control" name="qualifications[{{$key}}][soldier_level]">
                                <option value="1" @if($qualification->soldier_level == 1) selected @endif >اختر المرحلة</option>
                                <option value="2" @if($qualification->soldier_level == 2) selected @endif >الإبتدائية</option>
                                <option value="3" @if($qualification->soldier_level == 3) selected @endif >المتوسطة</option>
                                <option value="4" @if($qualification->soldier_level == 4) selected @endif >الثانوية</option>
                                <option value="5" @if($qualification->soldier_level == 5) selected @endif >كلية</option>
                                <option value="6" @if($qualification->soldier_level == 6) selected @endif >الجامعية</option>
                                <option value="7" @if($qualification->soldier_level == 7) selected @endif >أخرى</option>
                            </select>
                        </td>
                        <td>
                            {{Form::text('qualifications['.$key.'][soldier_specialization]',null, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('qualifications['.$key.'][soldier_educational_place_name]',null, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('qualifications['.$key.'][soldier_educational_place]',null, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            <input type="text" name="qualifications[{{$key}}][soldier_graduation_date]"
                                   class="form-control datetimepicker2" id=""
                                   value="{{$qualification->soldier_graduation_date ?? ''}}" readonly />

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="btn-group">
        <button id="qualifications" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>
    <div class="btn-group">
        <button id="remove-qualifications" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>
        </button>
    </div>
@else
    <div id="qualifications-container">
        <div class="row">
            <br>
            <p><b>المؤهلات الدراسية</b></p>
            <table class="table table-striped" id="qualifications-table">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('soldier_level', 'المرحلة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_specialization', 'التخصص', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_educational_place_name', 'المؤسسة التعليمية', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_educational_place', 'مكانها', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('soldier_graduation_date', 'تاريخ التخرج', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="btn-group">
        <button id="qualifications" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>
    <div class="btn-group">
        <button id="remove-qualifications" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>
        </button>
    </div>
@endif



@section('scripts')
    <script>
        var qua_count = 0
        var id = 1
        $('button#qualifications').click(function () {
            $('table#qualifications-table  tbody:last-child').append(`<tr>
                <td>
                    <select class="form-control" name="qualifications[` + qua_count + `][soldier_level]">
                    <option value="1">اختر المرحلة</option>
                    <option value="2">الإبتدائية</option>
                    <option value="3">المتوسطة</option>
                    <option value="4">الثانوية</option>
                    <option value="5">كلية</option>
                    <option value="6">الجامعية</option>
                    <option value="7">أخرى</option>
                    </select>

                </td>
                <td>
                 <input type="text" name="qualifications[` + qua_count + `][soldier_specialization]" class="form-control" >
                </td>
                <td>
                <input type="text" name="qualifications[` + qua_count + `][soldier_educational_place_name]" class="form-control" >
                </td>
                <td>
               <input type="text" name="qualifications[` + qua_count + `][soldier_educational_place]" class="form-control" >

                </td>
                <td>
                <input type="text" name="qualifications[` + qua_count + `][soldier_graduation_date]" readonly  class="form-control datetimepicker2"  id="soldier_qualification` + id + `" />

                </td>
            </tr>`)

            $('#soldier_qualification' + id).calendarsPicker({
                calendar: $.calendars.instance('islamic'),
                monthsToShow: [1, 1],
                dateFormat: 'yyyy-mm-dd'
            });
            id++
            qua_count++
        });

        $('button#remove-qualifications').click(function () {
            if ($("table#qualifications-table tbody tr").length !== 0) {
                $('table#qualifications-table tr:last').remove()
                qua_count--;
            }
        });
    </script>
@append