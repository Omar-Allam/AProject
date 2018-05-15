@extends('layout.app')

@section('header')

    {{--<h4>التشكيلات</h4>--}}
    {{--<p>--}}
    {{--<a class="btn btn-sm btn-success"  href="{{route('formation.create')}}">--}}
    {{--<i class="fa fa-plus"></i>--}}
    {{--</a>--}}
    {{--</p>--}}
@stop

@section('body')
    <section>
        <div class="col-md-3">
            <h4></h4>
            <a class="btn btn-success" href="{{route('formation.show',\App\Formation::first())}}"><i class="fa fa-edit"></i></a>
            <a class="btn btn-primary" href="{{route('formation.print',\App\Formation::first())}}"><i class="fa fa-print"></i></a>
        </div>
        <div class="col-md-9">
            <h4></h4>
            <form class="form-horizontal" action="{{route('formation.search')}}" method="post">
                {{method_field('POST')}} {{csrf_field()}}

                <div class="form-group">
                    <div class="col-md-2" style="padding: 0 !important;margin: 0!important;">
                        <select name="target" id="target" class="form-control">
                            <option value="private_number">الرقم الخاص</option>
                            <option value="general_number">الرقم العام</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="search">
                    </div>

                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    <a class="btn btn-danger" type="button"  href="{{route('formation.index')}}"><i class="fa fa-remove"></i></a>
                </div>
            </form>
        </div>
    </section>
    <section class="col-sm-12">
        @if ($soldiers->count())
            <table class="table table-hover">
                <thead class="bg-primary">
                <tr class="text-center">
                    <td style="width:10px">
                        {{Form::label('name', 'العدد', ['class' => 'control-label'])}}
                    </td>
                    <td style="width:80px">
                        {{Form::label('private_number', 'الرقم الخاص', ['class' => 'control-label'])}}
                    </td>
                    <td >
                        {{Form::label('general_number', 'الرقم العام', ['class' => 'control-label'])}}
                    </td>
                    <td style="width:120px">
                        {{Form::label('rate', 'الرتبة', ['class' => 'control-label'])}}
                    </td>

                    <td style="width:80px">
                        {{Form::label('job_description', 'مسمى الوظيفة', ['class' => 'control-label'])}}
                    </td>
                    <td style="width:230px">
                        {{Form::label('soldier_name', 'الاسم', ['class' => 'control-label'])}}
                    </td>
                    <td style="width:100px" >
                        {{Form::label('current_rate', 'الرتبة الحالية', ['class' => 'control-label'])}}
                    </td>


                    <td >
                        {{Form::label('is_participate', 'مشارك في عاصفة الحزم', ['class' => 'control-label'])}}
                    </td>


                    <td style="width:80px">
                        {{Form::label('notes', 'ملاحظات', ['class' => 'control-label'])}}
                    </td>

                </tr>
                </thead>
                <tbody>
                @foreach($soldiers as $key=>$soldier)
                    <tr class="text-center">
                        <td>{{$key+1}}</td>
                        <td>
                            {{$soldier->private_number?? ''}}
                        </td>

                        <td>
                            {{$soldier->soldier->general_number ?? ''}}
                        </td>

                        <td>
                            {{$soldier->soldier->rank->name ?? ''}}
                        </td>

                        <td>
                            {{$soldier->soldier->installed_job ?? ''}}
                        </td>

                        <td>
                            {{$soldier->soldier->name ?? ''}}
                        </td>


                        <td>
                            {{$soldier->current_rate ?? ''}}
                        </td>

                        <td class="text-center">
                            @if($soldier->is_participate==0) <i class="fa fa-times text-danger"></i> @else <i class="fa fa-check text-success"></i> @endif
                        </td>

                        <td>
                            {{$soldier->notes ?? ''}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا توجد تشكيلات</strong>
            </div>
        @endif
    </section>
@stop
