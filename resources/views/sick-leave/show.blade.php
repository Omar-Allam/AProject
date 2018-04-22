@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل إجازة</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')

    {{Form::open(['route' => ['sick-leave.update',$sickLeave], 'class' => 'col-sm-12'])}}
    {{method_field('PUT')}}
    @include('sick-leave._form')
    {{Form::close()}}
@stop