@extends('layout.print')
@section('body')
    <br>
    <div class="form-group text-center">
        <p style="font-size: larger"><b>  التشكيل الناطق لمكتب المهندسين مج ل ١٠  </b></p>
    </div>

    @if($formation->soldiers->count())
        @foreach($formation->soldiers as $key=>$soldier)
            <p>العدد :{{$key+1}}</p>
            <div class="row" style="border: solid black 1px;padding: 5px;border-radius: 15px;">
                {{csrf_field()}}
                <div class="form-group col-xs-2 {{$errors->has('first_name')? 'has-error' : ''}}">
                    {{Form::label('private_number', 'الرقم الخاص', ['class' => 'control-label'])}}
                    <p>{{$soldier['private_number'] ?? ''}}</p>
                </div>

                <div class="form-group col-xs-2 {{$errors->has('father_name')? 'has-error' : ''}}">
                    {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                    <p>{{$soldier['general_number'] ?? ''}}</p>
                </div>

                <div class="form-group col-xs-2 {{$errors->has('grandfather_name')? 'has-error' : ''}}">
                    {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                    <p>{{$soldier->rank->name ?? ''}}</p>
                </div>

                <div class="form-group  col-xs-2 {{$errors->has('family_name')? 'has-error' : ''}}">
                    {{Form::label('job_description', 'مسمى الوظيفة', ['class' => 'control-label'])}}
                    <p>{{$soldier['job_description'] ?? ''}}</p>
                </div>

                <div class="form-group  col-xs-2 {{$errors->has('rank_id')? 'has-error' : ''}}">
                    {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                    <p>{{$soldier['soldier_name'] ?? ''}}</p>

                </div>

                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('current_rate', 'الرتبة الحالية', ['class' => 'control-label'])}}
                    <p>{{$soldier['current_rate'] ?? ''}}</p>
                </div>

                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('is_participate', 'مشارك في عاصفة الحزم', ['class' => 'control-label'])}}
                    <p>@if($soldier['is_participate']) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</p>
                </div>
                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('is_a[]', 'شاغر', ['class' => 'control-label'])}}
                    <p>@if($soldier['is_participate']==1) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</p>

                </div>

                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('is_a[]', 'مجمد', ['class' => 'control-label'])}}
                    <p>@if($soldier['is_a'] == 2) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</p>

                </div>

                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('is_a[]', 'مكتسب', ['class' => 'control-label'])}}
                    <p>@if($soldier['is_a'] == 3) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</p>

                </div>

                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('is_a[]', 'مفرز', ['class' => 'control-label'])}}
                    <p>@if($soldier['is_a'] == 4) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</p>

                </div>

                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('tranformation', 'التنقلات والتعيين وإنهاء الخدمات', ['class' => 'control-label'])}}
                    <p>{{$soldier->soldier_status ? \App\FormationSoldiers::$status[$soldier->soldier_status] : ''}}</p>

                </div>

                <div class="form-group  col-xs-2 {{$errors->has('general_number')? 'has-error' : ''}}">
                    {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                    <p>{{$soldier['notes'] ?? ''}}</p>

                </div>
            </div>
            <hr>
            <div style="page-break-inside: auto"></div>
            <div style="page-break-before: auto"></div>
        @endforeach

    @endif

@endsection

@section('scripts')
    <script>
        window.print()
    </script>
@endsection