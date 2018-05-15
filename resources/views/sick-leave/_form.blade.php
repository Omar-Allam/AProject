<div id="row-formation" class="row-formation">
    <div class="row">
        <div  class="table-responsive">
            <table class="table table-striped" id="formations-table" style="overflow-x: scroll; width:2000px;">
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
                        {{Form::label('decision_number', 'رقم القرار', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('decision_date', 'تاريخ القرار', ['class' => 'control-label'])}}
                    </td>


                    <td>
                        {{Form::label('level', 'المرحلة', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('recommendation', 'التوصية', ['class' => 'control-label'])}}
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
                @if(isset($sickLeave))
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

                            {{Form::text('sickLeave[0][leave_from]',$sickLeave->leave_from ? $sickLeave->leave_from->format('Y-m-d') : '',['class' => 'form-control datetimepicker2','readonly'=>'readonly'])}}
                        </td>

                        <td>
                            {{Form::text('sickLeave[0][leave_to]', $sickLeave->leave_to ? $sickLeave->leave_to->format('Y-m-d') : '',['class' => 'form-control datetimepicker2','readonly'=>'readonly'])}}
                        </td>

                        <td>
                            {{Form::text('sickLeave[0][decision_number]', $sickLeave->decision_number ? $sickLeave->decision_number : '',['class' => 'form-control '])}}
                        </td>

                        <td>
                            {{Form::text('sickLeave[0][decision_date]', $sickLeave->decision_date ? $sickLeave->decision_date->format('Y-m-d') : '',['class' => 'form-control datetimepicker2','readonly'=>'readonly'])}}
                        </td>

                        <td>
                            {{Form::text('sickLeave[0][recommendation]',$sickLeave->recommendation ?? '', ['class' => 'form-control'])}}
                        </td>


                        <td>
                            {{Form::text('sickLeave[0][level]',$sickLeave->level ?? '', ['class' => 'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('sickLeave[0][period_of_vacation]',$sickLeave->period_of_vacation ?? '', ['class' => 'form-control'])}}
                        </td>

                        <td>
                            {{Form::text('sickLeave[0][direct_date]',$sickLeave->direct_date ? $sickLeave->direct_date->format('Y-m-d') : '', ['class' => 'form-control datetimepicker2','readonly'=>'readonly'])}}
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
                @endif
                </tbody>
            </table >
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

            var id = 1;
                    @if(isset($formation))
            var counter =
                    {{$formation->soldiers->count() ?? 0}}
            var count =
                    {{$formation->soldiers->count() ?? 0}}
            var soldier_count = $("table#formations-table tbody tr").length
                    @else
            var counter = 0
            var count = 0
            @endif
            $('button#formations').click(function () {
                counter++
                $('table#formations-table tbody:last-child').append(`
           <tr class="text-center">
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
               <input type="text" name="sickLeave[` + count + `][leave_from]" value=""  class="form-control datetimepicker2" id='leave_from` + id + `' readonly />
            </td>

             <td>
                <input type="text" name="sickLeave[` + count + `][leave_to]" value=""  class="form-control datetimepicker2" id='leave_to` + id + `' readonly />
            </td>



             <td>
                <input type="text" name="sickLeave[` + count + `][decision_number]" value=""  class="form-control"   />
            </td>

             <td>
                 <input type="text" name="sickLeave[` + count + `][decision_date]" value=""  class="form-control datetimepicker2" id='decision_date` + id + `' readonly />
            </td>

            <td>
                 <input type="text" name="sickLeave[` + count + `][recommendation]" value=""  class="form-control datetimepicker2"  />
            </td>

             <td>
                <input type="text" name="sickLeave[` + count + `][level]" value=""  class="form-control"   />
            </td>

             <td>
                <input type="text" name="sickLeave[` + count + `][period_of_vacation]"  class="form-control">
            </td>


             <td>
                 <input type="text" name="sickLeave[` + count + `][direct_date]" value=""  class="form-control datetimepicker2" id='direct_date` + id + `' readonly />
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

                $('#leave_from' + id).calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1, 1],
                    dateFormat: 'yyyy-mm-dd'
                });

                $('#leave_to' + id).calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1, 1],
                    dateFormat: 'yyyy-mm-dd'
                });

                $('#direct_date' + id).calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1, 1],
                    dateFormat: 'yyyy-mm-dd'
                });

                $('#decision_date' + id).calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1, 1],
                    dateFormat: 'yyyy-mm-dd'
                });
                id++
                count++
            });

            $('button#formations-remove').click(function () {
                if ($("table#formations-table tbody tr").length !== 0) {
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
                        data: {general_number: general_number},
                        url: '/get-soldier-info',
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