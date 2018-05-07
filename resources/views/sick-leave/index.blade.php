@extends('layout.app')

@section('header')

    <h4>الإجازات المرضية</h4>
    <p>
        @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(11))
            <a class="btn btn-sm btn-success" href="{{route('sick-leave.create')}}">
                <i class="fa fa-plus"></i>
            </a>
        @endif

        <a type="button" href="{{route('sickleave.print')}}"
           class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
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
                @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(13))
                    <th></th>
                @endif
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
                    <td>{{$sickLeaf->leave_to ? $sickLeaf->leave_to->diffInDays($sickLeaf->leave_from) : ''}}</td>
                    <td>{{$sickLeaf->direct_date ? $sickLeaf->direct_date->toDateString() : ''}}</td>
                    <td>{{$sickLeaf->notes ?? ''}}</td>
                    <td>
                        <form action="{{route('sick-leave.destroy',$sickLeaf)}}" method="POST">
                            {{csrf_field()}} {{method_field('DELETE')}}
                            @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(13))

                                <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i>
                                </button>
                            @endif

                            <a type="button" href="{{route('sleave.print',$sickLeaf)}}"
                               class="btn btn-xs btn-primary"><i class="fa fa-print"></i>
                            </a>
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
