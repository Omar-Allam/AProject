@extends('layout.print')
@section('body')
    <div class="row text-center">
        <h4><b>المشاركين فعليا في عمليات عاصفة الحزم وإعادة الأملاك</b></h4>
    </div>
<br>
    <section class="col-sm-12">
        @if ($soldiers->count())
            <table class="table table-hover table-striped">
                <thead class="bg-primary">
                <tr>
                    <th>الإسم</th>
                    <th>الرتبة</th>
                    <th>الرقم العسكري</th>
                    <th>الهوية الوطنية</th>
                </tr>
                </thead>
                <tbody>
                @foreach($soldiers as $soldier)
                    <tr>
                        <td>{{$soldier->soldier->name ?? ''}}</td>
                        <td>{{$soldier->soldier->rank->name ?? ''}}</td>
                        <td>{{$soldier->soldier->general_number ?? ''}}</td>
                        <td>{{$soldier->soldier->id_number ?? ''}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا توجد بيانات</strong>
            </div>
        @endif
    </section>

@endsection

@section('scripts')
    <script>
        window.print()
    </script>
@endsection