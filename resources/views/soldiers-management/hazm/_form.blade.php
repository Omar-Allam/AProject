<div>
    @if($soldiers)
        <div class="row">
            <div class="form-group">
            </div>
            <div class="table-responsive">
                <table class="table table-striped" >
                    <thead>
                    <tr class="text-center">
                        <td style="width:10px">
                            {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                        </td>
                        <td style="width:230px">
                            {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                        </td>
                        <td style="width:90px">
                            {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                        </td>
                        <td>
                            {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:120px">
                            {{Form::label('job_description', 'بداية المشاركة', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:120px">
                            {{Form::label('current_rate', 'نهاية المشاركة', ['class' => 'control-label'])}}
                        </td>


                        <td style="width:90px">
                            {{Form::label('is_participate', 'مكان المشاركة', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:90px">
                            {{Form::label('is_participate', 'طبيعة المشاركة', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:80px">
                            {{Form::label('is_participate', 'القوة الأساسية', ['class' => 'control-label'])}}
                        </td>

                        <td style="width:80px">
                            {{Form::label('is_participate', 'السجل المدني', ['class' => 'control-label'])}}
                        </td>

                        <td>
                            {{Form::label('is_participate', 'الوحدة', ['class' => 'control-label'])}}
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
                                {{Form::text('participation['.$key.'][soldier_name]',$soldier->soldier->name ?? '', ['class' => 'form-control soldier_name','readonly'=>'readonly'])}}

                            </td>
                            <td>

                                {{Form::text('participation['.$key.'][rate]',$soldier->soldier->rank->name ?? '', ['class' => 'form-control rate','readonly'=>'readonly'])}}
                            </td>
                            <td>
                                {{Form::text('participation['.$key.'][general_number]',$soldier->soldier->general_number ?? '', ['class' => 'form-control','readonly'=>'readonly'])}}
                            </td>

                            <td>
                                {{Form::text('participation['.$key.'][start_date]',$soldier->soldier->hazm->start_date ?? '', ['class' => 'form-control datetimepicker2'])}}
                            </td>

                            <td>
                                {{Form::text('participation['.$key.'][end_date]', $soldier->soldier->hazm->end_date ?? ''        ,['class' => 'form-control datetimepicker2'])}}
                            </td>

                            <td>
                                {{Form::text('participation['.$key.'][place_of_participation]',$soldier->soldier->hazm->place_of_participation ?? '',['class' => 'form-control'])}}
                            </td>

                            <td>
                                {{Form::text('participation['.$key.'][type_of_participation]',$soldier->soldier->hazm->type_of_participation ?? '',['class' => 'form-control'])}}
                            </td>

                            <td>
                                {{Form::text('participation['.$key.'][main_power]',$soldier->soldier->hazm->main_power ?? '',['class' => 'form-control'])}}
                            </td>

                            <td>
                                {{Form::text('participation['.$key.'][civil_register]',$soldier->soldier->hazm->civil_register ?? '',['class' => 'form-control'])}}
                            </td>


                            <td>
                                {{Form::text('participation['.$key.'][unit]','كتيبة المهندسين مج ل 10',['class' => 'form-control'])}}
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <button class="btn btn-lg btn-info" type="submit"><i class="fa fa-save"></i> حفظ</button>
            </div>

            @else


        </div>
</div>
@endif


