<div id="row-formation" class="row-formation">
    @if(isset($formation) && $formation->soldiers)
        <div class="row">
            <table class="table table-striped" id="formations-table">
                <thead>
                <tr>
                    <td>
                        {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                    </td>


                    <td>
                        {{Form::label('current_rate', 'الرتبة الحالية', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                    </td>
                </tr>

                </thead>
                <tbody>
                @foreach($formation->soldiers as $key=>$soldier)
                    <tr>
                        <td>
                            {{++$key}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][private_number]',$soldier->private_number, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][general_number]',$soldier->soldier->general_number, ['class' => 'form-control formation-gn'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][rate]',$soldier->soldier->rank->name, ['class' => 'form-control rate','readonly'=>'readonly'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][job_description]',$soldier->job_description, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][soldier_name]',$soldier->soldier->name, ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}

                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][current_rate]',$soldier->current_rate, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][notes]',$soldier->notes, ['class' => 'form-control'])}}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @else
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
                                {{Form::label('reason', 'سبب الإعفاء', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('leave_form', 'تاريخ بداية الإعفاء', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('leave_to', 'تاريخ نهاية الإعفاء', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('period_of_vacation', 'مدة الإعفاء', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('prev_balance', 'الرصيد السابق للإعفاءات', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('side_of_acceptance', 'جهة الإعتماد', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('tasks', 'المهام', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                            </td>
                        </tr>

                        </thead>
                        <tbody>
                        @if(isset($exemption))
                            <tr class="text-center">
                                <td>
                                    1
                                </td>

                                <td>
                                    {{Form::text('exemption[0][general_number]',$exemption->soldier->general_number ?? '',['class' => 'form-control sickleave-gn'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][soldier_name]',$exemption->soldier->name ?? '', ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][rate]',$exemption->soldier->rank->name ?? '', ['class' => 'form-control rate','readonly'=>'readonly'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][reason]',$exemption->reason ?? '', ['class' => 'form-control job_description'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][start_from]', $exemption->start_from ?? '' ,['class' => 'form-control datetimepicker2' , 'readonly'=>'readonly'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][end_at]', $exemption->end_at ?? '',['class' => 'form-control datetimepicker2', 'readonly'=>'readonly'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][period_of_vacation]',$exemption->exemption_period ?? '', ['class' => 'form-control'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][prev_balance]',$exemption->prev_balance ?? '', ['class' => 'form-control'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][side_of_acceptance]',$exemption->side_of_acceptance ?? '' , ['class' => 'form-control'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][tasks]',$exemption->tasks ?? '' , ['class' => 'form-control'])}}
                                </td>

                                <td>
                                    {{Form::text('exemption[0][notes]',$exemption->notes ?? '', ['class' => 'form-control'])}}
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            @endif


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
                    {{$formation->soldiers->count() ?? 1}}
            var count =
                    {{$formation->soldiers->count() ?? 0}}
            var soldier_count = $("table#formations-table tbody tr").length
                    @else
            var counter = 0
            var count = 0
            @endif
            $('button#formations').click(function () {
                counter++
                $('table#formations-table tr:last').after(`
           <tr>
           <td>
           ` + ((counter.toLocaleString('en'))) + `
           </td>
            <td>
                <input type="text" name="exemption[` + count + `][general_number]"  class="form-control sickleave-gn">
            </td>
            <td>
                <input type="text" name="exemption[` + count + `][soldier_name]" id="formation-gn"  readonly="readonly" class="form-control soldier_name">
            </td>

            <td>
                <input type="text" name="exemption[` + count + `][rate]" readonly="readonly" class="form-control rate">
             </td>
            <td>
                <input type="text" name="exemption[` + count + `][reason]"  class="form-control">
            </td>

           <td>
                <input type="text" name="exemption[` + count + `][start_from]" id="start_from`+id+`"   class="form-control" readonly>
            </td>

             <td>
                <input type="text" name="exemption[` + count + `][end_at]" id="end_at`+id+`"  class="form-control " readonly>
            </td>


             <td>
                <input type="text" name="exemption[` + count + `][period_of_vacation]"  class="form-control">
            </td>


            <td>
                <input type="text" name="exemption[` + count + `][prev_balance]"  class="form-control">
            </td>

             <td>
                <input type="text" name="exemption[` + count + `][side_of_acceptance]"  class="form-control">
            </td>

            <td>
             <input type="text" name="exemption[` + count + `][tasks]"  class="form-control">
             </td>

             <td>
             <input type="text" name="exemption[` + count + `][notes]"  class="form-control">
             </td>
           </tr>`)
                $('#start_from'+id).calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1,1],
                    dateFormat: 'yyyy-mm-dd'
                });

                $('#end_at'+id).calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1,1],
                    dateFormat: 'yyyy-mm-dd'
                });

                count++
                id++
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