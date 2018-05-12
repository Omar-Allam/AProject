@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل المشاركين في عاصفة الحزم وإعادة الأمل</h4>

    <a href="{{URL::previous()}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
@endsection


@section('body')

    {{Form::open(['route' => 'hazm-soldiers.updateHazm', 'class' => 'col-sm-12'])}}
    {{method_field('POST')}}{{csrf_field()}}
    @include('soldiers-management.hazm._form')
    {{Form::close()}}
@endsection
