@extends('layout.print')
@section('body')
    <br>
    <div class="form-group text-center">
        <p style="font-size: larger"><b>أسماء الضباط والأفراد الذين لم يباشروا</b></p>
    </div>

    <div class="row">
        <section class="col-sm-12">
            @if ($soldiers->count())
                <table class="table table-hover table-bordered">
                    <thead class="bg-primary">
                    <tr>
                        <th>
                            العدد
                        </th>
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
                            تاريخ بداية / نهاية النقل / الإلحاق
                        </th>

                        <th>
                            سبب التأخر في المباشرة
                        </th>

                        <th>
                            الإجراء المتخذ من قائد الوحدة
                        </th>

                        <th>
                            ملاحظات
                        </th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($soldiers as $key=>$soldier)
                        <tr>
                            <td>
                                {{$key+1}}
                            </td>
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
                                {{$soldier->join_date ?? ''}}
                            </td>

                            <td>
                                {{$soldier->taken_action ?? ''}}
                            </td>

                            <td>
                                {{$soldier->reason ?? ''}}
                            </td>

                            <td>
                                {{$soldier->notes ?? ''}}
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        window.print()
    </script>
@endsection