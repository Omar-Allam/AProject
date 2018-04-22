@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل الإعفاء</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')

    {{Form::open(['route' => ['exemption.update',$exemption], 'class' => 'col-sm-12'])}}
    {{method_field('PUT')}}
    @include('medical-exemption._form')
    {{Form::close()}}
@stop