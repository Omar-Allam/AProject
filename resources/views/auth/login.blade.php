@extends('layout.app')

@section('header')
    <h4 class="panel-title">تسجيل الدخول</h4>
@endsection
@section('body')
    <div class="col-sm-8 col-sm-offset-3" style="margin-right: 330px">
        <img class="img-fluid " src="{{asset('images/bryah.png')}}"
             style="height: 180px;width: 180px;padding: 10px;">
        <img class="img-fluid " src="{{asset('images/main-logo.png')}}"
             style="height: 200px;width: 200px;padding: 10px;">
        <img class="img-fluid " src="{{asset('images/defence.png')}}"
             style="height: 200px;width: 200px;padding: 10px;">
    </div>
    <br><br>
    <form class="col-sm-8 col-sm-offset-1 form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {!! csrf_field() !!}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="login" class="col-sm-4 control-label">اسم المستخدم</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="error-message">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="control-label col-sm-4">كلمة المرور</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="password" id="password">
                @if ($errors->has('password'))
                    <span class="error-message">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> الدخول
                </button>

            </div>
        </div>
    </form>
@endsection
