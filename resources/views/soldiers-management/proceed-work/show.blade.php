@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل وإضافة الضباط والأفراد الذين لم يباشروا  </h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@endsection


@section('body')

    {{Form::open(['route' => 'proceed-soldiers.updateProceed', 'class' => 'col-sm-12'])}}
    {{method_field('POST')}}{{csrf_field()}}
    @include('soldiers-management.proceed-work._form')
    {{Form::close()}}
@endsection
