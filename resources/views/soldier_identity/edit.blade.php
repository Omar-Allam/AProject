@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل هوية فرد</h4>
    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@stop


@section('body')
    {{Form::model($soldier, ['route' => ['identity.update', $soldier], 'class' => 'col-sm-12'])}}

    {{method_field('patch')}}

    @include('soldier_identity._form')

    {{Form::close()}}
@stop