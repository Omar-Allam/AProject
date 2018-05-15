@extends('layout.app')

@section('header')


@stop

@section('body')
    <section class="row">
        <div class="col-sm-3">
            <h4>هويات الأفراد</h4>
            <p>
                @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(3))

                    <a class="btn btn-sm btn-success" href="{{route('identity.create')}}">
                        <i class="fa fa-plus"></i>
                    </a>
                @endif

                <a type="button" href="{{route('identity-all.print')}}" class="btn btn-sm btn-primary"><i
                            class="fa fa-print"></i>
                </a>
            </p>
        </div>

        <div class="col-md-9">
            <h4></h4>
            <form class="form-horizontal" action="{{route('identify.search')}}" method="post">
                {{method_field('POST')}} {{csrf_field()}}

                <div class="form-group">
                    <div class="col-md-2" style="padding: 0 !important;margin: 0!important;">
                        <select name="target" id="target" class="form-control">
                            <option value="general_number">الرقم العام</option>
                            <option value="id_number">رقم الهوية</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="general_number">
                    </div>

                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    <a class="btn btn-danger" type="button"  href="{{route('identity.index')}}"><i class="fa fa-remove"></i></a>
                </div>
            </form>
        </div>

    </section>

    <div class="row">
        <section class="col-sm-12">
            @if ($soldiers->total())
                <table class="table table-condensed table-bordered table-hover">
                    <thead class="bg-primary">
                    <tr>
                        <th>الإسم</th>
                        <th>الرقم العام</th>
                        <th>الوحدة</th>
                        <th>الرتبة</th>
                        <th>تاريخ تعبئة النموذج</th>
                        <th>المسئول عن تعبئة النموذج</th>
                        <th>آخر تعديل على النموذج</th>
                        @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(5))
                            <th class="col-md-1"></th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($soldiers as $soldier)
                        <tr>
                            <td><a href="{{route('identity.edit', $soldier)}}">{{$soldier->name ?? ''}}</a></td>
                            <td><a href="{{route('identity.edit', $soldier)}}">{{$soldier->general_number ?? ''}}</a>
                            </td>
                            <td>{{$soldier->unit ?? ''}}</td>
                            <td>{{$soldier->rank->name ?? ''}}</td>
                            <td>{{$soldier->created_at->format('Y/m/d') ?? ''}}</td>
                            <td>{{$soldier->created_by ?? ''}}</td>
                            <td>{{$soldier->last_update_by ?? ''}}</td>
                            <td>
                                <form action="{{route('identity.destroy',$soldier)}}" method="POST">
                                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(5))
                                        {{csrf_field()}} {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-xs btn-warning"><i
                                                    class="fa fa-trash-o"></i>
                                        </button>
                                    @endif
                                    <a type="button" href="{{route('identity.print',$soldier)}}"
                                       class="btn btn-xs btn-primary"><i class="fa fa-print"></i>
                                    </a>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $soldiers->links() }}

            @else
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا يوجد أفراد</strong>
                </div>
            @endif
        </section>
    </div>
@stop
