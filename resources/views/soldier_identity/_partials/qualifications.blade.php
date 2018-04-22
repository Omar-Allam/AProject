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
                            {{Form::text('qualifications['.$key.'][soldier_level]',null, ['class' => 'form-control'])}}
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
                            {{Form::date('qualifications['.$key.'][soldier_graduation_date]',null, ['class' => 'form-control'])}}
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
                <tr>
                    <td>
                        {{Form::text('qualifications[0][soldier_level]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::text('qualifications[0][soldier_specialization]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::text('qualifications[0][soldier_educational_place_name]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::text('qualifications[0][soldier_educational_place]',null, ['class' => 'form-control'])}}
                    </td>
                    <td>
                        {{Form::date('qualifications[0][soldier_graduation_date]',null, ['class' => 'form-control'])}}
                    </td>
                </tr>
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
        $('button#qualifications').click(function () {
            qua_count++
            $('table#qualifications-table tr:last').after(`<tr>
                <td>
                    <input type="text" name="qualifications[` + qua_count + `][soldier_level]" class="form-control" required>
                </td>
                <td>
                 <input type="text" name="qualifications[` + qua_count + `][soldier_specialization]" class="form-control" required>
                </td>
                <td>
                <input type="text" name="qualifications[` + qua_count + `][soldier_educational_place_name]" class="form-control" required>
                </td>
                <td>
               <input type="text" name="qualifications[` + qua_count + `][soldier_educational_place]" class="form-control" required>

                </td>
                <td>
                <input type="text" name="qualifications[` + qua_count + `][soldier_graduation_date]" class="form-control" required>
                </td>
            </tr>`)
        });

        $('button#remove-qualifications').click(function () {
            if ($("table#qualifications-table tbody tr").length > 1) {
                $('table#qualifications-table tr:last').remove()
                qua_count--;
            }
        });
    </script>
@append