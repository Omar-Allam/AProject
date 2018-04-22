@extends('layout.app')

@section('header')

    <h4>الإجازات المرضية</h4>
    <p>
        <a class="btn btn-sm btn-success" href="{{route('sick-leave.create')}}">
            <i class="fa fa-plus"></i>
        </a>
    </p>
@stop

@section('body')
    <section class="col-sm-12">
        <table class="table table-striped table-hover">
            <thead class="bg-primary">
            <tr>
                <th>الرقم</th>
                <th>الإسم</th>
                <th>الرتبة</th>
                <th>الوحدة</th>
                <th>مدة الإجازة</th>
                <th>تاريخ المباشرة</th>
                <th>ملاحظات</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($sickLeaves as $sickLeaf)
                <tr>
                    <td>
                        <a href="{{route('sick-leave.show',$sickLeaf).'?edit='.str_random()}}">{{$sickLeaf->soldier->general_number ?? ''}}</a>
                    </td>
                    <td>{{$sickLeaf->soldier->name ?? ''}}</td>
                    <td>{{$sickLeaf->soldier->rank->name ?? ''}}</td>
                    <td></td>
                    <td>{{$sickLeaf->leave_to->diffInDays($sickLeaf->leave_from) ?? ''}}</td>
                    <td>{{$sickLeaf->direct_date->toDateString() ?? ''}}</td>
                    <td>{{$sickLeaf->notes ?? ''}}</td>
                    <td>
                        <form action="{{route('sick-leave.destroy',$sickLeaf)}}" method="POST">
                            {{csrf_field()}} {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {{--<div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا توجد إجازات مرضية </strong>--}}
        {{--</div>--}}

    </section>
@stop
