@extends('layout.app')

@section('header')

    <h4>الإعفاءات الطبية</h4>
    @if (Auth::user()->hasRole(1) || Auth::user()->hasRole(14))
        <p>
            <a class="btn btn-sm btn-success" href="{{route('exemption.create')}}">
                <i class="fa fa-plus"></i>
            </a>
        </p>
    @endif
@stop

@section('body')
    <section class="col-sm-12">
        @if ($exemptions->count())
            <table class="table table-hover table-bordered">
                <thead class="bg-primary">
                <tr>
                    <th>الرقم العام</th>
                    <th>الإسم</th>
                    <th>الرتبة</th>
                    <th>سبب الإعفاء</th>
                    <th>مدة الإعفاء</th>
                    <th>المهام التي يعفى منها</th>
                    <th>الرصيد السابق للإعفاءات</th>
                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(17))
                        <th></th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($exemptions as $exemption)
                    <tr>
                        <td>
                            <a href="{{route('exemption.show',$exemption).'?edit='.str_random()}}">{{$exemption->soldier->general_number ?? ''}}</a>
                        </td>
                        <td>{{$exemption->soldier->name ?? ''}}</td>
                        <td>{{$exemption->soldier->rank->name ?? ''}}</td>
                        <td>{{$exemption->reason ?? ''}}</td>
                        <td>{{$exemption->end_at->diffInDays($exemption->start_from) ?? ''}}</td>
                        <td>{{$exemption->tasks ?? ''}}</td>
                        <td>{{$exemption->prev_balance ?? ''}}</td>

                            <td>
                                <form action="{{route('exemption.destroy',$exemption)}}" method="POST">
                                    {{csrf_field()}} {{method_field('DELETE')}}
                                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(17))

                                    <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i>
                                    </button>
                                    @endif
                                    <a type="button" href="{{route('exemption.print',$exemption)}}" class="btn btn-xs btn-primary"><i class="fa fa-print"></i>
                                    </a>
                                </form>
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا توجد إعفاءات</strong>
            </div>
        @endif
    </section>
@stop
