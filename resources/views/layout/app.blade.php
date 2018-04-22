<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Army</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.css">

</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-left" href="#">
                <img class="img-circle" src="{{asset('images/logo.png')}}" style="height: 50px;width: 50px;padding: 3px;">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ><a href="{{route('identity.index')}}">هوية فرد <span class="sr-only">(current)</span></a></li>
                <li><a href="{{route('formation.index')}}">التشكيل</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">الاجازات المرضية والإعفاءات <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('sick-leave.index')}}">الإجازات</a></li>
                        <li><a href="{{route('exemption.index')}}">الإعفاءات</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">التقارير <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('hazm.participate')}}">المشاركين في عاصفة الحزم</a></li>
                        <li><a href="{{route('human.energy')}}">الطاقة البشرية</a></li>
                        <li><a href="{{route('eng.weapon')}}">سلاح المهندسين</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>

    <!-- /.container-fluid -->
</nav>


<div class="container-fluid" >
    @yield('header')

    <div id="app" >
        @yield('body')
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
{{--<script src="{{asset('js/bootstrap.js')}}"></script>--}}
@yield('scripts')
<script>
</script>

</body>
</html>