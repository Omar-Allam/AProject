@extends('layout.app')

@section('header')
    <h4 class="pull-left">إضافة مستخدم</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')
    {{Form::open(['route' => 'user.store', 'class' => 'col-sm-12'])}}

    @include('user._form')

    {{Form::close()}}
@stop
