@extends('layout.app')

@section('header')


    <h4>أسماء الضباط والأفراد  الموقوفة رواتبهم  </h4>
    <p>
        <a class="btn btn-sm btn-success" href="{{route('suspend-soldiers.displaySuspend')}}">
            <i class="fa fa-edit"></i>
        </a>

        <a class="btn btn-sm btn-primary" href="{{route('suspend-soldiers.print')}}">
            <i class="fa fa-print"></i>
        </a>
    </p>


@stop

@section('body')
    <div class="row">
        <section class="col-sm-12">
            @if ($soldiers->count())
                <table class="table table-hover">
                    <thead class="bg-primary">
                    <tr>
                        <th>
                            الرتبة
                        </th>
                        <th>
                            الرقم العام
                        </th>

                        <th>
                            التخصص
                        </th>

                        <th>
                            الإسم
                        </th>

                        <th>
                            الوحدة
                        </th>

                        <th>
                            سبب الإيقاف
                        </th>

                        <th>
                            بداية الإيقاف
                        </th>

                        <th>
                            الإجراء المتخذ من قائد الوحدة
                        </th>

                        <th>
                            ملاحظات
                        </th>

                        <th>

                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($soldiers as $soldier)
                        <tr>
                            <td>
                                {{$soldier->soldier->rank->name ?? ''}}
                            </td>


                            <td>
                                {{$soldier->soldier->general_number ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->specialization ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->name ?? ''}}
                            </td>

                            <td>
                                {{$soldier->unit ?? ''}}
                            </td>

                            <td>
                                {{$soldier->suspend_reason ?? ''}}
                            </td>

                            <td>
                                {{$soldier->suspend_start ?? ''}}
                            </td>

                            <td>
                                {{$soldier->taken_action ?? ''}}
                            </td>

                            <td>
                                {{$soldier->notes ?? ''}}
                            </td>


                            <td>
                                <form action="{{route('suspend-soldiers.delete',$soldier)}}" method="POST">
                                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(5))
                                        {{csrf_field()}} {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i>
                                        </button>
                                    @endif
                                </form>
                            </td>



                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    {!! $soldiers->links() !!}
                </div>
            @else
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا توجد بيانات</strong>
                </div>
            @endif
        </section>
    </div>
@stop
