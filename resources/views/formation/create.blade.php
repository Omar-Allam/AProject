@extends('layout.app')

@section('header')
    <h4 class="pull-left">إضافة تشكيل</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')
    {{Form::open(['route' => 'formation.store', 'class' => 'col-sm-12'])}}

    @include('formation._form')

    {{Form::close()}}
@stop
