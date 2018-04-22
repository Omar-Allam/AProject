@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل تشكيل</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')

    {{Form::open(['route' => ['formation.update',$formation], 'class' => 'col-sm-12'])}}
    {{method_field('PUT')}}
    @include('formation._form')
    {{Form::close()}}
@stop