@extends('layout.app')

@section('header')


@stop

@section('body')
    <h4>هويات الأفراد</h4>
    <p>
        <a class="btn btn-sm btn-success"  href="{{route('identity.create')}}">
            <i class="fa fa-plus"></i>
        </a>
    </p>
    <section class="col-sm-12">
    @if ($soldiers->total())
        <table class="table table-condensed table-bordered table-hover">
            <thead class="bg-primary">
            <tr>
                <th>الإسم</th>
                <th>الرقم العام</th>
                <th>الوحدة</th>
                <th>الرتبة</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($soldiers as $soldier)
                <tr>
                    <td><a href="{{route('identity.edit', $soldier)}}">{{$soldier->name}}</a></td>
                    <td><a href="{{route('identity.edit', $soldier)}}">{{$soldier->general_number}}</a></td>
                    <td>{{$soldier->unit}}</td>
                    <td>{{$soldier->rank->name}}</td>
                    <td>
                        <form action="{{route('identity.destroy',$soldier)}}" method="POST">
                            {{csrf_field()}} {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
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
