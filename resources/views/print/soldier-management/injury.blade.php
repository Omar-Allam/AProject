@extends('layout.print')
@section('body')
    <br>
    <div class="form-group text-center">
        <p style="font-size: larger"><b>بيان بأسماء الضباط والأفراد المصابين </b></p>
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
                            تاريخ الإصابة
                        </th>

                        <th>
                            نوع الإصابة
                        </th>

                        <th>
                            مكان الإصابة
                        </th>

                        <th>
                            تاريخ العودة
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
                                {{$soldier->injury_date ?? ''}}
                            </td>

                            <td>
                                {{$soldier->injury_type ?? ''}}
                            </td>

                            <td>
                                {{$soldier->injury_place ?? ''}}
                            </td>

                            <td>
                                {{$soldier->return_date ?? ''}}
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