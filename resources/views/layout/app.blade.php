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

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div style=" @if(!Route::is('login'))
            background-color: white;
            @else
            background-image:url('/images/background.png');
            @endif
            height: 10px;display: flex"></div>


    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            @if(!Route::is('login'))
                <a class="navbar-left" href="{{url('/')}}">
                    <img class="img-circle" src="{{asset('images/main-logo.png')}}"
                         style="height: 30px;width: 30px;">
                </a>
            @endif
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        @if(Auth::check())
            <div class="collapse navbar-collapse" style="padding-top: 2px" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(2))
                        <li><a href="{{route('identity.index')}}">هوية فرد <span class="sr-only">(current)</span></a>
                        </li>
                    @endif
                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(6))
                        <li><a href="{{route('formation.index')}}">التشكيل</a></li>
                    @endif
                </ul>

                <ul class="nav navbar-nav navbar-left">
                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(10) || Auth::user()->hasRole(14))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">الاجازات المرضية والإعفاءات <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(10))
                                    <li><a href="{{route('sick-leave.index')}}">الإجازات</a></li>
                                @endif
                                @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(14))
                                    <li><a href="{{route('exemption.index')}}">الإعفاءات</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(22))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">التقارير <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('hazm.participate')}}">المشاركين في عاصفة الحزم</a></li>
                                <li><a href="{{route('human.energy')}}">الطاقة البشرية</a></li>
                                <li><a href="{{route('eng.weapon')}}">سلاح المهندسين</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(18))
                        <li><a href="{{route('user.index')}}">إدارة المستخدمين</a></li>
                    @endif

                </ul>

                <ul class="nav navbar-nav navbar-left">
                    {{--                    <li><a href="{{route('system.backup')}}">نسخة إحتياطية</a></li>--}}
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    تسجيل الخروج </a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>

                    </li>
                </ul>
            </div>
        @else
            <p style="color: #f6cd98;padding-top: 2px;font-size: larger" class="text-center">قيادة سلاح المهندسين ((
                كتيبة المهندسين مج ل ١٠ ))</p>
    @endif
    <!-- /.navbar-collapse -->
    </div>


    <!-- /.container-fluid -->
</nav>


<div class="container-fluid" style="padding-top: 50px">
    @yield('header')

    <div id="app">
        @yield('body')
    </div>


    <div class="footer" style="display: flex;flex-direction: column">
        <div style="display:flex;flex-direction: row;">
            <div>
                <img src="{{asset('images/defence.jpg')}}"
                     style="height: 50px;width: 150px;padding: 10px; border-radius: 10px">
            </div>
            <div style="flex-grow:5"></div>
            <div>
                <img src="{{asset('images/ro2ya.jpg')}}"
                     style="height: 50px;width: 150px;padding: 10px; border-radius: 10px">
            </div>
        </div>

        <div style="
        @if(!Route::is('login'))
                background-color: white;
        @else
                background-image:url('/images/background.png');
                @endif
                height: 10px;"></div>

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
<script src="{{asset('js/jquery1.11.1.js')}}"></script>
<script src="{{asset('js/jquery.calendars.js')}}"></script>
<script src="{{asset('js/jquery.calendars.plus.js')}}"></script>
<script src="{{asset('js/jquery.plugin.min.js')}}"></script>
<script src="{{asset('js/jquery.calendars.picker.js')}}"></script>
<script src="{{asset('js/jquery.calendars.islamic.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/jquery.calendars.picker.css')}}">


<script>
    $('.datetimepicker2').calendarsPicker({
        calendar: $.calendars.instance('islamic'),
        monthsToShow: [1, 1],
        dateFormat: 'yyyy-mm-dd'
    });
</script>
</body>
</html>