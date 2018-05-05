@if(isset($soldier) && $soldier->jobs)
    <br>
    <p><b>الوظائف والأماكن التي عمل بها</b></p>
    <table class="table table-striped" id="jobs-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('job_name', 'اسم الوظيفة', ['class' => 'control-label'])}}
            </td>

            <td>
                {{Form::label('soldier_job_unit', 'الوحدة', ['class' => 'control-label'])}}

            </td>
            <td>
                {{Form::label('consider_from', 'إعتبارا من', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>
        @foreach($soldier->jobs as $key=>$job)
            <tr>
                <td>
                    {{$key+1}}
                </td>
                <td>
                    {{Form::text('jobs['.$key.'][job_name]',$job->job_name ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    {{Form::text('jobs['.$key.'][soldier_job_unit]',$job->soldier_job_unit ?? '', ['class' => 'form-control'])}}
                </td>
                <td>
                    <input type="text" name="jobs[{{$key}}][consider_from]"  class="form-control datetimepicker2" id="" value="{{$job->consider_from ?? ''}}" required>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="btn-group">
        <button id="jobs" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>

    <div class="btn-group">
        <button id="remove-job" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
    </div>
@else
    <table class="table table-striped" id="jobs-table">
        <thead>
        <tr class="text-center">
            <td>
                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
            </td>
            <td>
                {{Form::label('job_name', 'اسم الوظيفة', ['class' => 'control-label'])}}
            </td>

            <td>
                {{Form::label('soldier_job_unit', 'الوحدة', ['class' => 'control-label'])}}

            </td>
            <td>
                {{Form::label('consider_from', 'إعتبارا من', ['class' => 'control-label'])}}
            </td>
        </tr>

        </thead>
        <tbody>

        </tbody>
    </table>
    <div class="btn-group">
        <button id="jobs" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
    </div>

    <div class="btn-group">
        <button id="remove-job" type="button" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></button>
    </div>
@endif

@section('scripts')
    <script>
        var jobs_counter = $('#courses-table > tbody:last > tr').length
        var jobs_count = 0
        var id = 1
        $('button#jobs').click(function () {
            jobs_counter++
            $('table#jobs-table tbody:last-child').append(`
            <tr>
            <td><p>` + ((jobs_counter)) + `</p></td>
            <td>
             <input type="text" name="jobs[` + jobs_count + `][job_name]"  class="form-control" required>
            </td>
            <td>
                <input type="text" name="jobs[` + jobs_count + `][soldier_job_unit]"  class="form-control" required>
            </td>
            <td>
              <input type="text" name="jobs[` + jobs_count + `][consider_from]"  class="form-control" id="soldier_jobs`+id+`" required>
            </td>
            </tr>
            `)

            $('#soldier_jobs'+id).calendarsPicker({
                calendar: $.calendars.instance('islamic'),
                monthsToShow: [1,1],
                dateFormat: 'yyyy-mm-dd'
            });
            id++


            jobs_count++

        });

        $('button#remove-job').click(function () {
            if ($("table#jobs-table tbody tr").length !== 1) {
                $('table#jobs-table tr:last').remove()
                jobs_counter--
                jobs_count--
            }
        });
    </script>
@append