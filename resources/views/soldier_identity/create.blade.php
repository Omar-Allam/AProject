@extends('layout.app')

@section('header')
    <h4 class="pull-left">إضافة هوية فرد</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')
    {{Form::open(['route' => 'identity.store', 'class' => 'col-sm-12'])}}

    @include('soldier_identity._form')

    {{Form::close()}}

@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.datetimepicker2').datetimepicker({
                locale: {calender: 'ummalqura', lang: 'ar'},
                format: 'YYYY-MM-DD'
            });

            $('#datetimepicker2').datetimepicker({
                locale: {calender: 'ummalqura', lang: 'ar'},
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@stop
