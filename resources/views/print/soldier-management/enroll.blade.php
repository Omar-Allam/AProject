@extends('layout.print')
@section('body')
    <br>
    <div class="form-group text-center">
        <p style="font-size: larger"><b>بيان بأسماء الضباط والأفراد  الملحقين </b></p>
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
                            الوحدة الأساسية
                        </th>

                        <th>
                            الوحدة الملحق عليها
                        </th>

                        <th>
                            بداية الإلحاق
                        </th>

                        <th>
                            نهاية الإلحاق
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
                                {{$soldier->main_unit ?? ''}}
                            </td>

                            <td>
                                {{$soldier->enroll_unit ?? ''}}
                            </td>

                            <td>
                                {{$soldier->enroll_start ?? ''}}
                            </td>

                            <td>
                                {{$soldier->enroll_end ?? ''}}
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