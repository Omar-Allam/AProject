@extends('layout.app')

@section('header')
    <h4>المشاركين فعليا في عمليات عاصفة الحزم وإعادة الأمل</h4>
    <p>
        {{--<a class="btn btn-sm btn-success"  href="{{route('exemption.create')}}">--}}
            {{--<i class="fa fa-plus"></i>--}}
        {{--</a>--}}
        <a type="button" href="{{route('hazm.print')}}"
           class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
        </a>
    </p>
@stop

@section('body')
    <section class="col-sm-12">
        @if ($soldiers->total())
            <table class="table table-hover table-striped">
                <thead class="bg-primary">
                <tr>
                    <th>الإسم</th>
                    <th>الرتبة</th>
                    <th>الرقم العسكري</th>
                    <th>الهوية الوطنية</th>
                </tr>
                </thead>
                <tbody>
                @foreach($soldiers as $soldier)
                    <tr>
                            <td>{{$soldier->soldier->name ?? ''}}</td>
                            <td>{{$soldier->soldier->rank->name ?? ''}}</td>
                            <td>{{$soldier->soldier->general_number ?? ''}}</td>
                            <td>{{$soldier->soldier->id_number ?? ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا توجد بيانات</strong>
            </div>
        @endif
    </section>
    {{$soldiers->links()}}
@stop
