<div id="row-formation" class="row-formation">
    @if($soldiers)
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped" id="formations">
                    <thead>
                    <tr class="text-center">
                        <td style="width:10px">
                            {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                        </td>
                        <td style="width:120px">
                            {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:80px">
                            {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                        </td>
                        <td style="width:80px">
                            {{Form::label('specialization', 'التخصص', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:230px">
                            {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:80px">
                            {{Form::label('unit', 'الوحدة ', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:100px">
                            {{Form::label('suspend_reason', 'سبب الإيقاف', ['class' => 'control-label'])}}
                        </td>


                        <td style="width:100px">
                            {{Form::label('suspend_start', ' بداية الإيقاف', ['class' => 'control-label'])}}
                        </td>


                        <td style="width:100px">
                            {{Form::label('taken_action', 'الإجراء المتخذ من قائد الوحدة ', ['class' => 'control-label'])}}
                        </td>


                        <td style="width:80px">
                            {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                        </td>

                    </tr>

                    </thead>
                    <tbody>
                    @foreach($soldiers as $key=>$soldier)
                        <tr class="text-center">
                            <td>
                                {{$key+1}}
                            </td>
                            <td>

                                {{Form::text('suspend['.$key.'][rate]',$soldier->soldier->rank->name ?? '', ['class' => 'form-control rate','readonly'=>'readonly'])}}
                            </td>

                            <td>
                                {{Form::text('suspend['.$key.'][general_number]',$soldier->soldier->general_number ?? '', ['class' => 'form-control formation-gn'])}}
                            </td>
                            <td>
                                {{Form::text('suspend['.$key.'][specialization]',$soldier->soldier->specialization ?? '', ['class' => 'form-control','readonly'=>'readonly'])}}
                            </td>

                            <td>
                                {{Form::text('suspend['.$key.'][soldier_name]',$soldier->soldier->name ?? '', ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}

                            </td>

                            <td>
                                {{Form::text('suspend['.$key.'][unit]',$soldier->unit ?? '', ['class' => 'form-control '])}}

                            </td>

                            <td>
                                {{Form::text('suspend['.$key.'][suspend_reason]',$soldier->suspend_reason ?? '', ['class' => 'form-control'])}}

                            </td>

                            <td>
                                {{Form::text('suspend['.$key.'][suspend_start]',$soldier->suspend_start ?? '', ['class' => 'form-control','readonly'=>'readonly'])}}

                            </td>

                            <td>
                                {{Form::text('suspend['.$key.'][taken_action]',$soldier->taken_action ?? '', ['class' => 'form-control'])}}

                            </td>

                            <td>
                                {{Form::text('suspend['.$key.'][notes]',$soldier->notes, ['class' => 'form-control'])}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                    <table class="table table-striped" id="formations">
                        <thead>
                        <tr class="text-center">
                            <td style="width:10px">
                                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                            </td>
                            <td style="width:120px">
                                {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                            </td>

                            <td style="width:80px">
                                {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                            </td>
                            <td style="width:80px">
                                {{Form::label('specialization', 'التخصص', ['class' => 'control-label'])}}
                            </td>

                            <td style="width:230px">
                                {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                            </td>

                            <td style="width:80px">
                                {{Form::label('unit', 'الوحدة ', ['class' => 'control-label'])}}
                            </td>

                            <td style="width:100px">
                                {{Form::label('suspend_reason', 'سبب الإيقاف', ['class' => 'control-label'])}}
                            </td>


                            <td style="width:100px">
                                {{Form::label('suspend_start', ' بداية الإيقاف', ['class' => 'control-label'])}}
                            </td>


                            <td style="width:100px">
                                {{Form::label('taken_action', 'الإجراء المتخذ من قائد الوحدة ', ['class' => 'control-label'])}}
                            </td>


                            <td style="width:80px">
                                {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                            </td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>
                                {{$key+1}}
                            </td>
                            <td>

                                {{Form::text('suspend[0][rate]',$soldier->soldier->rank->name ?? '', ['class' => 'form-control rate','readonly'=>'readonly'])}}
                            </td>

                            <td>
                                {{Form::text('suspend[0][general_number]',$soldier->soldier->general_number ?? '', ['class' => 'form-control formation-gn'])}}
                            </td>

                            <td>
                                {{Form::text('suspend[0][specialization]',$soldier->soldier->specialization ?? '', ['class' => 'form-control' ,'readonly'=>'readonly'])}}
                            </td>

                            <td>
                                {{Form::text('suspend[0][soldier_name]',$soldier->soldier->name ?? '', ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}

                            </td>

                            <td>
                                {{Form::text('suspend[0][unit]',$soldier->unit ?? '', ['class' => 'form-control '])}}

                            </td>

                            <td>
                                {{Form::text('suspend[0][suspend_reason]',$soldier->suspend_reason ?? '', ['class' => 'form-control '])}}

                            </td>

                            <td>
                                {{Form::text('suspend[0][suspend_start]',$soldier->suspend_start ?? '', ['class' => 'form-control '])}}

                            </td>

                            <td>
                                {{Form::text('suspend[0][taken_action]',$soldier->taken_action ?? '', ['class' => 'form-control '])}}

                            </td>


                            <td>
                                {{Form::text('suspend[0][notes]',$soldier->notes, ['class' => 'form-control'])}}
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            @endif


        </div>


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
        <br><br>
        <div class="row">
            <div class="form-group">
                <button class="btn btn-lg btn-info" type="submit"><i class="fa fa-save"></i> حفظ</button>
            </div>
        </div>

    @section('scripts')
        <script>
            var id = 1;

            @if(isset($soldiers))
            var counter =
                    {{$soldiers->count() ?? 0}}
            var count =
                    {{$soldiers->count() ?? 0}}
            var soldier_count = $("table#formations-table tbody tr").length
                    @else
            var counter = 1
            var count = 0
            @endif
            $('button#formations').click(function () {
                counter++
                $('table#formations tbody:last-child').append(`
           <tr class="text-center">
           <td>
           ` + ((counter.toLocaleString('en'))) + `
           </td>
           <td>
                <input type="text" name="suspend[` + count + `][rate]" readonly="readonly" class="form-control rate">
             </td>
            <td>
                <input type="text" name="suspend[` + count + `][general_number]" id="formation-gn"  class="form-control formation-gn">
            </td>

            <td>
                <input type="text" name="suspend[` + count + `][specialization]" readonly="readonly"  class="form-control specialization">
            </td>

            <td>
                <input type="text" name="suspend[` + count + `][soldier_name]" readonly="readonly" class="form-control soldier_name">
            </td>
            <td>
                <input type="text" name="suspend[` + count + `][unit]" " class="form-control ">
            </td>

            <td>
                <input type="text" name="suspend[` + count + `][suspend_reason]"  class="form-control ">
            </td>

             <td>
                <input type="text" name="suspend[` + count + `][suspend_start]" readonly="readonly" id="suspend_start`+id+`"   class="form-control datetimepicker2">
            </td>


 <td>
                <input type="text" name="suspend[` + count + `][taken_action]"  id="enroll_end`+id+`" class="form-control  ">
            </td>


            <td>
             <input type="text" name="suspend[` + count + `][notes]"  class="form-control">
            </td>

           </tr>`)

                $('#suspend_start' + id).calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1, 1],
                    dateFormat: 'yyyy-mm-dd'
                });


                id++
                count++
            });

            $('button#formations-remove').click(function () {

                if ($("table#formations tbody tr").length !== 0) {
                    $('table#formations  tr:last').remove()
                    counter--;
                    count--;
                }
            });

            $(document).on('blur', '.formation-gn', function () {
                let general_number = $(this).val()
                if (general_number.length > 0) {
                    $.ajax({
                        type: "GET",
                        data: {general_number: general_number},
                        url: '/get-soldier-info',

                    }).done((res) => {
                        if (res !== 0) {
                            $(this).parent().parent().children().find('.rate').val(res.rank)
                            $(this).parent().parent().children().find('.soldier_name').val(res.name)
                            $(this).parent().parent().children().find('.job_description').val(res.job_description)
                            $(this).parent().parent().children().find('.specialization').val(res.specialization)
                        } else {
                            $(this).parent().parent().children().find('.rate').val('')
                            $(this).parent().parent().children().find('.soldier_name').val('')
                            $(this).parent().parent().children().find('.specialization').val('')
                        }
                    });
                }
            });

        </script>
@append