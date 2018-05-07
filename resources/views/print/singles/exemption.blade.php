@extends('layout.print')
@section('body')
    <br>
    <div class="form-group text-center">
        <p style="font-size: larger"><b>الإعفاء الطبي - {{$exemption->soldier->name?? ''}}</b></p>
    </div>
    <p>العدد : 1</p>
    <div class="row" style="border: solid black 1px;padding: 5px;border-radius: 15px;">
        {{csrf_field()}}

        <div class="form-group col-xs-3 {{$errors->has('father_name')? 'has-error' : ''}}">
            {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
            <p>{{$exemption->soldier->general_number ?? ''}}</p>
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('rank_id')? 'has-error' : ''}}">
            {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
            <p>{{$exemption->soldier->name?? ''}}</p>

        </div>

        <div class="form-group col-xs-3 {{$errors->has('grandfather_name')? 'has-error' : ''}}">
            {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
            <p>{{$exemption->soldier->rank->name ?? ''}}</p>
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('family_name')? 'has-error' : ''}}">
            {{Form::label('reason', 'سبب الإعفاء', ['class' => 'control-label'])}}
            <p>{{$exemption->reason ?? ''}}</p>
        </div>


        <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('leave_form', 'تاريخ بداية الإعفاء', ['class' => 'control-label'])}}
            <p>{{$exemption->start_from ? $exemption->end_at->format('Y-m-d') : ''}}</p>
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('leave_to', 'تاريخ نهاية الإعفاء', ['class' => 'control-label'])}}
            <p>{{$exemption->end_at ? $exemption->end_at->format('Y-m-d') :''}}</p>
        </div>
        <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('exemption_period', 'مدة الإعفاء', ['class' => 'control-label'])}}
            @if(!$exemption->exemption_period)
                <p>{{$exemption->end_at ? $exemption->end_at->diffInDays($exemption->start_from) : ''}}</p>
            @else
                <p>{{$exemption->exemption_period ?? ''}}</p>
            @endif
        </div>

        <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('prev_balance', 'الرصيد السابق للإعفاءات', ['class' => 'control-label'])}}
            <p>{{$exemption->prev_balance ?? ''}}</p>

        </div>

        <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('side_of_acceptance', 'جهة الإعتماد', ['class' => 'control-label'])}}
            <p>{{$exemption->side_of_acceptance ?? ''}}</p>

        </div>

        <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('tasks', 'المهام', ['class' => 'control-label'])}}
            <p>{{$exemption->tasks ?? ''}}</p>

        </div>

        <div class="form-group  col-xs-3 {{$errors->has('general_number')? 'has-error' : ''}}">
            {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
            <p>{{$exemption->notes ?? ''}}</p>
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