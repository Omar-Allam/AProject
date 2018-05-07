@extends('layout.print')
@section('body')
    <br>
    <div class="form-group text-center">
        <p style="font-size: larger"><b> إجازة مرضية - {{$sickLeaf->soldier->name ?? ''}}</b></p>
    </div>
            <p>العدد: 1</p>
            <div class="row" style="border: solid black 1px;padding: 5px;border-radius: 15px;">
                {{csrf_field()}}

                <div class="form-group col-xs-3 {{$errors->has('father_name')? 'has-error' : ''}}">
                    {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->soldier->general_number ?? ''}}</p>
                </div>

                <div class="form-group  col-xs-3 {{$errors->has('rank_id')? 'has-error' : ''}}">
                    {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->soldier->name?? ''}}</p>

                </div>

                <div class="form-group col-xs-3 {{$errors->has('grandfather_name')? 'has-error' : ''}}">
                    {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->soldier->rank->name ?? ''}}</p>
                </div>

                <div class="form-group  col-xs-3 {{$errors->has('family_name')? 'has-error' : ''}}">
                    {{Form::label('reason', 'سبب الإجازة', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->reason ?? ''}}</p>
                </div>



                <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('leave_form', 'تاريخ بداية الإجازة', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->leave_from ? $sickLeaf->leave_from->format('Y-m-d') : ''}}</p>
                </div>

                <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('leave_to', 'تاريخ نهاية الإجازة', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->leave_to ? $sickLeaf->leave_to->format('Y-m-d') : '' }}</p>
                </div>
                <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('period_of_vacation', 'مدة الإجازة الحالية', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->period_of_vacation ?? ''}}</p>
                </div>

                <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('direct_date', 'تاريخ المباشرة', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->direct_date ? $sickLeaf->direct_date->format('Y-m-d') :''}}</p>

                </div>

                <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('prev_balance', 'الرصيد السابق للإجازات', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->prev_balance ?? ''}}</p>

                </div>

                <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('side_of_acceptance', 'جهة الإعتماد', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->side_of_acceptance ?? ''}}</p>

                </div>

                <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                    <p>{{$sickLeaf->notes ?? ''}}</p>
                </div>

            </div>
            <hr>
            <div style="page-break-inside: auto"></div>
            <div style="page-break-before: auto"></div>


@endsection

@section('scripts')
    <script>
        window.print()
    </script>
@endsection