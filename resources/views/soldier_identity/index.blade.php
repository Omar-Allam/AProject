@extends('layout.app')

@section('header')


@stop

@section('body')
    <h4>هويات الأفراد</h4>
    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(3))
        <p>
            <a class="btn btn-sm btn-success" href="{{route('identity.create')}}">
                <i class="fa fa-plus"></i>
            </a>
        </p>
    @endif
    <section class="col-sm-12">
        @if ($soldiers->total())
            <table class="table table-condensed table-bordered table-hover">
                <thead class="bg-primary">
                <tr>
                    <th>الإسم</th>
                    <th>الرقم العام</th>
                    <th>الوحدة</th>
                    <th>الرتبة</th>
                    <th>تاريخ تعبئة النمودج</th>
                    <th>المسئول عن تعبئة النموذج</th>
                    <th>آخر تعديل على النموذج</th>
                @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(5))
                        <th></th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($soldiers as $soldier)
                    <tr>
                        <td><a href="{{route('identity.edit', $soldier)}}">{{$soldier->name ?? ''}}</a></td>
                        <td><a href="{{route('identity.edit', $soldier)}}">{{$soldier->general_number ?? ''}}</a></td>
                        <td>{{$soldier->unit ?? ''}}</td>
                        <td>{{$soldier->rank->name ?? ''}}</td>
                        <td>{{$soldier->created_at->format('Y/m/d') ?? ''}}</td>
                        <td>{{$soldier->created_by ?? ''}}</td>
                        <td>{{$soldier->last_update_by ?? ''}}</td>
                        @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(5))
                            <td>
                                <form action="{{route('identity.destroy',$soldier)}}" method="POST">
                                    {{csrf_field()}} {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $soldiers->links() }}

        @else
            <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا يوجد أفراد</strong></div>
        @endif
    </section>
@stop
