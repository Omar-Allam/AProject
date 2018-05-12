@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل الضباط والأفراد الشهداء </h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@endsection


@section('body')

    {{Form::open(['route' => 'martyrdom-soldiers.updateMartydom', 'class' => 'col-sm-12'])}}
    {{method_field('POST')}}{{csrf_field()}}
    @include('soldiers-management.martydom._form')
    {{Form::close()}}
@endsection
