@extends('layout.app')

@section('header')
    <h4 class="pull-left">إضافة إجازة</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')
    {{Form::open(['route' => 'sick-leave.store', 'class' => 'col-sm-12'])}}

    @include('sick-leave._form')

    {{Form::close()}}
@stop
