<div id="row-formation" class="row-formation">
    <div class="row">

        <div>
            <table class="table table-striped" id="formations-table">
                <thead>
                <tr>
                    <td>
                        {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('general_number', ' الرقم العام', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_name', 'الإسم', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('reason', 'سبب الإجازة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('leave_form', 'تاريخ بداية الإجازة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('leave_to', 'تاريخ نهاية الإجازة', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('period_of_vacation', 'مدة الإجازة الحالية', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('direct_date', 'تاريخ المباشرة', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('prev_balance', 'الرصيد السابق للإجازات', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('side_of_acceptance', 'جهة الإعتماد', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>
                <tr class="text-center">
                    <td>
                        1
                    </td>
                    <td>
                        {{Form::text('sickLeave[0][general_number]',$sickLeave->soldier->general_number ?? '' , array_merge(['class' => 'form-control sickleave-gn'],request('edit')?['readonly'=>'readonly']:[]))}}
                    </td>
                    <td>
                        {{Form::text('sickLeave[0][soldier_name]',$sickLeave->soldier->name ?? '', ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}

                    </td>

                    <td>
                        {{Form::text('sickLeave[0][rate]',$sickLeave->soldier->rank->name ?? '', ['class' => 'form-control rate','readonly'=>'readonly'])}}
                    </td>
                    <td>
                        {{Form::text('sickLeave[0][reason]',$sickLeave->reason ?? '', ['class' => 'form-control job_description'])}}
                    </td>

                    <td>
                        {{Form::date('sickLeave[0][leave_from]', $sickLeave->leave_from ?? '',['class' => 'form-control'])}}
                    </td>

                    <td>
                        {{Form::date('sickLeave[0][leave_to]', $sickLeave->leave_to ?? '',['class' => 'form-control'])}}
                    </td>

                    <td>
                        {{Form::text('sickLeave[0][period_of_vacation]',$sickLeave->period_of_vacation ?? '', ['class' => 'form-control'])}}
                    </td>

                    <td>
                        {{Form::date('sickLeave[0][direct_date]',$sickLeave->direct_date ?? '', ['class' => 'form-control'])}}
                    </td>

                    <td>
                        {{Form::text('sickLeave[0][prev_balance]',$sickLeave->prev_balance ?? '', ['class' => 'form-control'])}}
                    </td>

                    <td>
                        {{Form::text('sickLeave[0][side_of_acceptance]',$sickLeave->side_of_acceptance ?? '', ['class' => 'form-control'])}}
                    </td>

                    <td>
                        {{Form::text('sickLeave[0][notes]',$sickLeave->notes ?? '', ['class' => 'form-control'])}}
                    </td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>


    @if(!request('edit'))
        <div class="row">
            <div class="btn-group">
                <button id="formations" type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>
                </button>
            </div>

            <div class="btn-group">
                <button id="formations-remove" type="button" class="btn btn-sm btn-danger"><i
                            class="fa fa-remove"></i>
                </button>
            </div>
        </div>
    @endif

    <br><br>
    <div class="row">
        <div class="form-group">
            <button class="btn btn-lg btn-info" type="submit"><i class="fa fa-save"></i> حفظ</button>
        </div>
    </div>

    @section('scripts')
        <script>
                    @if(isset($formation))
            var counter =
                    {{$formation->soldiers->count() ?? 1}}
            var count =
                    {{$formation->soldiers->count() ?? 0}}
            var soldier_count = $("table#formations-table tbody tr").length
                    @else
            var counter = 1
            var count = 0
            @endif
            $('button#formations').click(function () {
                counter++
                count++
                $('table#formations-table tr:last').after(`
           <tr>
           <td>
           ` + ((counter.toLocaleString('en'))) + `
           </td>
            <td>
                <input type="text" name="sickLeave[` + count + `][general_number]"  class="form-control sickleave-gn">
            </td>
            <td>
                <input type="text" name="sickLeave[` + count + `][soldier_name]" id="formation-gn"  readonly="readonly" class="form-control soldier_name">
            </td>

            <td>
                <input type="text" name="sickLeave[` + count + `][rate]" readonly="readonly" class="form-control rate">
             </td>
            <td>
                <input type="text" name="sickLeave[` + count + `][reason]"  class="form-control">
            </td>

           <td>
                <input type="date" name="sickLeave[` + count + `][leave_from]"  class="form-control">
            </td>

             <td>
                <input type="date" name="sickLeave[` + count + `][leave_to]"  class="form-control ">
            </td>


             <td>
                <input type="text" name="sickLeave[` + count + `][period_of_vacation]"  class="form-control">
            </td>


             <td>
                <input type="date" name="sickLeave[` + count + `][direct_date]"  class="form-control ">
            </td>

            <td>
                <input type="text" name="sickLeave[` + count + `][prev_balance]"  class="form-control">
            </td>

             <td>
                <input type="text" name="sickLeave[` + count + `][side_of_acceptance]"  class="form-control">
            </td>

            <td>
             <input type="text" name="sickLeave[` + count + `][notes]"  class="form-control">
             </td>
           </tr>`)
            });

            $('button#formations-remove').click(function () {

                if ($("table#formations-table tbody tr").length > 1) {
                    $('div.row-formation tr:last').remove()
                    counter--;
                    count--;
                }
            });

            $(document).on('blur', '.sickleave-gn', function () {
                let general_number = $(this).val()
                if (general_number.length > 0) {
                    $.ajax({
                        type: "GET",
                        url: '/get-soldier-info?soldier-id=' + general_number,

                    }).done((res) => {
                        if (res != 0) {
                            $(this).parent().parent().children().find('.rate').val(res.rank)
                            $(this).parent().parent().children().find('.soldier_name').val(res.name)
                        }
                    });
                }
            });

        </script>
@append