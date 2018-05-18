@extends('layout.app')

@section('header')
    <section>
        <div class="col-md-3">
            <h4></h4>

        </div>
        <div class="col-md-9">
            <h4></h4>
            <form class="form-horizontal" action="{{route('exemption.search')}}" method="post">
                {{method_field('POST')}} {{csrf_field()}}

                <div class="form-group">
                    <div class="col-md-2" style="padding: 0 !important;margin: 0!important;" id="search_criteria">
                        <select name="target" id="target" class="form-control">
                            <option value="1">الرقم العام</option>
                            <option value="2">بداية ونهاية الإجازة</option>
                        </select>
                    </div>
                    <div  id="search_area">
                        <input type="text" class="form-control col-md-4" name="general_number">

                    </div>

                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                    <a class="btn btn-danger" type="button" href="{{route('formation.index')}}"><i
                                class="fa fa-remove"></i></a>
                </div>
            </form>
        </div>
    </section>
    <h4>الإعفاءات الطبية</h4>
        <p>
            @if (Auth::user()->hasRole(1) || Auth::user()->hasRole(14))

            <a class="btn btn-sm btn-success" href="{{route('exemption.create')}}">
                <i class="fa fa-plus"></i>
            </a>
            @endif

            <a type="button" href="{{route('exemption.print')}}" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
            </a>
        </p>
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
                        <td>
                            @if(!$exemption->exemption_period)
                                <p>{{$exemption->end_at ? $exemption->end_at->diffInDays($exemption->start_from) : ''}}</p>
                            @else
                                <p>{{$exemption->exemption_period ?? ''}}</p>
                            @endif
                        </td>
                        <td>{{$exemption->tasks ?? ''}}</td>
                        <td>{{$exemption->prev_balance ?? ''}}</td>

                            <td>
                                <form action="{{route('exemption.destroy',$exemption)}}" method="POST">
                                    {{csrf_field()}} {{method_field('DELETE')}}
                                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(17))

                                    <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i>
                                    </button>
                                    @endif
                                    <a type="button" href="{{route('sexemption.print',$exemption)}}" class="btn btn-xs btn-primary"><i class="fa fa-print"></i>

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
@endsection


@section('scripts')
    <script>
        $('#search_criteria').on('change',function(e){
            if(e.target.value == 1){
                $('#search_area').html(`
                                        <input type="text" class="form-control col-md-4" placeholder="الرقم العام" name="general_number">
                `)
            }
            else if(e.target.value == 2){
                $('#search_area').html(`
                                        <input type="text" placeholder="بداية الإعفاء" class="form-control col-md-4 datetimepicker2" id="start_from" name="start_from">
                                        <input type="text" placeholder="نهاية الإعفاء" class="form-control col-md-4 datetimepicker2" id="end_at" name="end_at">
                `)

                $('#start_from').calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1,1],
                    dateFormat: 'yyyy-mm-dd'
                });

                $('#end_at').calendarsPicker({
                    calendar: $.calendars.instance('islamic'),
                    monthsToShow: [1,1],
                    dateFormat: 'yyyy-mm-dd'
                });
            }
        })
    </script>
@endsection
