@extends('layout.print')
@section('body')
    <br>
    <div class="form-group text-center">
        <p style="font-size: larger"><b>بيان بأسماء المشاركين في عمليتي عاصفة الحزم وإعادة الأمل </b></p>
    </div>

    <div class="row">
        <section class="col-sm-12">
            @if ($soldiers->count())
                <table class="table table-hover">
                    <thead class="bg-primary">
                    <tr>
                        <th>
                            الإسم
                        </th>
                        <th>
                            الرتبة
                        </th>

                        <th>
                            الرقم العام
                        </th>

                        <th>
                            بداية المشاركة
                        </th>

                        <th>
                            نهاية المشاركة
                        </th>

                        <th>
                            مكان المشاركة
                        </th>

                        <th>
                            طبيعة المشاركة
                        </th>

                        <th>
                            القوة الأساسية
                        </th>

                        <th>
                            السجل المدني
                        </th>

                        <th>
                            الوحدة
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($soldiers as $soldier)
                        <tr>
                            <td>
                                {{$soldier->soldier->name ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->rank->name ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->general_number ?? ''}}
                            </td>


                            <td>
                                {{$soldier->soldier->hazm->start_date ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->hazm->end_date ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->hazm->place_of_participation ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->hazm->type_of_participation ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->hazm->main_power ?? ''}}
                            </td>


                            <td>
                                {{$soldier->soldier->hazm->civil_register ?? ''}}
                            </td>

                            <td>
                                {{$soldier->soldier->hazm->unit ?? ''}}
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