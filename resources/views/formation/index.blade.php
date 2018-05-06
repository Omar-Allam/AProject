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
    <section class="col-sm-12">
        @if ($formations->count())
            <table class="table table-hover">
                <thead class="bg-primary">
                <tr>
                    <th> التشكيل</th>
                    <th>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($formations as $formation)
                    <tr>
                        <td class="col-md-9">
                            <a href="{{route('formation.show',$formation)}}">{{$formation->name}}</a>
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
