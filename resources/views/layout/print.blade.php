<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Army</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css').'?blabla'}}">
    <link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" media="all" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css?blabla')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-flipped.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('styles')
</head>

<body>
@yield('header')
<div class="container">
    <div id="app">
        @yield('body')
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/sweet.js')}}"></script>
@include('sweetalert::alert')
<script src="{{asset('js/jQuery.js')}}"></script>
<script src="{{asset('js/jquery.calendars.min.js')}}"></script>
<script src="{{asset('js/jquery.calendars.ummalqura.min.js')}}"></script>
<script src="{{asset('js/jquery.calendars.ummalqura-ar.js')}}"></script>
<script src="{{asset('js/bootstrap-calendars.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>

@yield('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.plus.min.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.plugin.min.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.picker.js"></script>
<script src="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/js/jquery.calendars.islamic.min.js"></script>

<link href="https://cdn.rawgit.com/kbwood/calendars/2.1.0/dist/css/jquery.calendars.picker.css" rel="stylesheet"/>
<script>
    $('.datetimepicker2').calendarsPicker({
        calendar: $.calendars.instance('islamic'),
        monthsToShow: [1, 1],
        dateFormat: 'yyyy-mm-dd'
    });
</script>
</body>
</html>