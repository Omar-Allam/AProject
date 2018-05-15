@extends('layout.app')

@section('header')
    <h4 class="pull-left">تعديل هوية فرد</h4>
    <div class="btn-group-vertical pull-right">
    <a href="{{route('identity.index')}}" class="btn btn-sm btn-default pull-right"><i class="fa fa-chevron-left"></i></a>
    <a type="button" href="{{route('identity.print',$soldier)}}"
       class="btn btn-sm btn-primary pull-right"><i class="fa fa-print"></i>
    </a>
    </div>
@stop


@section('body')
    {{Form::model($soldier, ['route' => ['identity.update', $soldier], 'class' => 'col-sm-12'])}}

    {{method_field('patch')}}

    @include('soldier_identity._form')

    {{Form::close()}}
@stop