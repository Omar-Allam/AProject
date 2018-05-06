<div id="row-formation" class="row-formation">
    @if(isset($formation) && $formation->soldiers)
        <div class="row">
            <div class="form-group">
                <p><b>التشكيل</b></p>
                <input type="text" class="form-control" name="formation_name" value="{{$formation->name}}" required>
            </div>


            <table class="table table-striped" id="formations" style="overflow-y:scroll;">
                <thead>
                <tr class="text-center">
                    <td>
                        {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('private_number', 'الرقم الخاص', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('job_description', 'مسمى الوظيفة', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                    </td>
                    <td>
                        {{Form::label('current_rate', 'الرتبة الحالية', ['class' => 'control-label'])}}
                    </td>


                    <td>
                        {{Form::label('is_participate', 'مشارك في عاصفة الحزم', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('is_a[]', 'شاغر', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('is_a[]', 'مجمد', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('is_a[]', 'مكتسب', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('is_a[]', 'مفرز', ['class' => 'control-label'])}}
                    </td>

                    <td>
                        {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                    </td>

                </tr>

                </thead>
                <tbody>
                @foreach($formation->soldiers as $key=>$soldier)
                    <tr class="text-center">
                        <td>
                            {{++$key}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][private_number]',$soldier->private_number, ['class' => 'form-control'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][general_number]',$soldier->soldier->general_number ?? '', ['class' => 'form-control formation-gn'])}}
                        </td>
                        <td>

                            {{Form::text('formation['.$key.'][rate]',$soldier->soldier->rank->name ?? '', ['class' => 'form-control rate','readonly'=>'readonly'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][job_description]',$soldier->soldier->installed_job ?? '', ['class' => 'form-control','readonly'=>'readonly'])}}
                        </td>
                        <td>
                            {{Form::text('formation['.$key.'][soldier_name]',$soldier->soldier->name ?? '', ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}

                        </td>
                        <td>
                            {{Form::select('formation['.$key.'][current_rate]', \App\SoldierRate::all()->pluck('name','id'), $soldier->current_rate ?? null ,['class' => 'form-control'])}}
                        </td>

                        <td>
                            {{Form::checkbox('formation['.$key.'][is_participate]',$soldier->is_participate, $soldier->is_participate)}}
                        </td>
                        <td>
                            {{Form::radio('formation['.$key.'][is_a]',1, $soldier->is_a == 1)}}
                        </td>
                        <td>
                            {{Form::radio('formation['.$key.'][is_a]',2, $soldier->is_a == 2)}}
                        </td>
                        <td>
                            {{Form::radio('formation['.$key.'][is_a]',3, $soldier->is_a == 3)}}
                        </td>
                        <td>
                            {{Form::radio('formation['.$key.'][is_a]',4,$soldier->is_a == 4)}}
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
                    <p><b>التشكيل</b></p>

                    <input type="text" class="form-control" name="formation_name" value="{{$formation->name ?? ''}}"
                           required>

                    <table class="table table-striped" id="formations">
                        <thead>
                        <tr class="text-center">
                            <td>
                                {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('formation[0][private_number]', 'الرقم الخاص', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('formation[0][general_number]', 'الرقم العام', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('formation[0][rate]', 'الرتبة', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('formation[0][job_description]', 'مسمى الوظيفة', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('formation[0][soldier_name]', 'الاسم', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('formation[0][current_rate]', 'الرتبة الحالية', ['class' => 'control-label'])}}
                            </td>
                            <td>
                                {{Form::label('formation[0][is_participate]', 'مشارك في عاصفة الحزم', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('formation[0][is_a]', 'شاغر', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('formation[0][is_a]', 'مجمد', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('formation[0][is_a]', 'مكتسب', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('formation[0][is_a]', 'مفرز', ['class' => 'control-label'])}}
                            </td>

                            <td>
                                {{Form::label('formation[0][notes]', 'ملاحظات', ['class' => 'control-label'])}}
                            </td>
                        </tr>

                        </thead>
                        <tbody>
                        <tr class="text-center">
                            <td>
                                1
                            </td>
                            <td>
                                {{Form::text('formation[0][private_number]',$soldier->private_number ?? '', ['class' => 'form-control'])}}
                            </td>
                            <td>
                                {{Form::text('formation[0][general_number]',$soldier->soldier->general_number ?? '' , ['class' => 'form-control formation-gn'])}}
                            </td>
                            <td>
                                {{Form::text('formation[0][rate]',$soldier->soldier->rank->name ?? '', ['class' => 'form-control rate','readonly'=>'readonly'])}}
                            </td>
                            <td>
                                {{Form::text('formation[0][job_description]',$soldier->job_description ?? '', ['class' => 'form-control job_description','readonly'=>'readonly'])}}
                            </td>
                            <td>
                                {{Form::text('formation[0][soldier_name]',$soldier->soldier->name ?? '', ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}

                            </td>
                            <td>
                                {{Form::select('formation[0][current_rate]', \App\SoldierRate::all()->pluck('name','id'),$soldier->current_rate ?? null,['class' => 'form-control'])}}
                            </td>
                            <td>
                                {!! Form::checkbox('formation[0][is_participate]',null,false) !!}
                                {{--                                {{Form::checkbox('formation[1][is_participate]',null, ['class' => 'form-control'])}}--}}
                            </td>
                            <td>
                                {{Form::radio('formation[0][is_a]',1, false)}}
                            </td>
                            <td>
                                {{Form::radio('formation[0][is_a]',2, false)}}
                            </td>
                            <td>
                                {{Form::radio('formation[0][is_a]',3, false)}}
                            </td>
                            <td>
                                {{Form::radio('formation[0][is_a]',4, false)}}
                            </td>
                            <td>
                                {{Form::text('formation[0][notes]',$soldier->notes ?? '', ['class' => 'form-control'])}}
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
                $('table#formations tr:last').after(`
           <tr class="text-center">
           <td>
           ` + ((counter.toLocaleString('en'))) + `
           </td>
            <td>
                <input type="text" name="formation[` + count + `][private_number]"  class="form-control">
            </td>
            <td>
                <input type="text" name="formation[` + count + `][general_number]" id="formation-gn"  class="form-control formation-gn">
            </td>

            <td>
                <input type="text" name="formation[` + count + `][rate]" readonly="readonly" class="form-control rate">
             </td>
            <td>
                <input type="text" name="formation[` + count + `][job_description]" readonly="readonly"  class="form-control job_description">
            </td>

           <td>
                <input type="text" name="formation[` + count + `][soldier_name]" readonly="readonly" class="form-control soldier_name">
            </td>

            <td>
            <select name="formation[` + count + `][current_rate]" class="form-control">
            @foreach(\App\SoldierRate::all() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
                    </select>

                    </td>
<td>
<input type="checkbox"  name="formation[` + count + `][is_participate]">
</td>

<td>
<input type="radio"  name="formation[` + count + `][is_a]" value="1">
</td>

<td>
<input type="radio"  name="formation[` + count + `][is_a]" value="2">
</td>

<td>
<input type="radio"  name="formation[` + count + `][is_a]" value="3">
</td>

<td>
<input type="radio"  name="formation[` + count + `][is_a]" value="4">
</td>
                    <td>
                     <input type="text" name="formation[` + count + `][notes]"  class="form-control">
             </td>
           </tr>`)
            });

            $('button#formations-remove').click(function () {
                if ($("#formations tr:last").index() > 1) {
                    $('table#formations tr:last').remove()
                    counter--;
                    count--;
                }
            });

            $(document).on('blur', '.formation-gn', function () {
                let general_number = $(this).val()
                if (general_number.length > 0) {
                    $.ajax({
                        type: "GET",
                        url: '/get-soldier-info?soldier-id=' + general_number,

                    }).done((res) => {
                        if (res != 0) {
                            $(this).parent().parent().children().find('.rate').val(res.rank)
                            $(this).parent().parent().children().find('.soldier_name').val(res.name)
                            $(this).parent().parent().children().find('.job_description').val(res.job_description)
                        }
                    });
                }
            });

        </script>
@append