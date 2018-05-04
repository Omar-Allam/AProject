@extends('layout.app')

@section('header')

    <h4>المستخدمين</h4>
    @if(Auth::user()->hasRole(1) || Auth::user()->hasRole(8))
        <p>
            <a class="btn btn-sm btn-success" href="{{route('user.create')}}">
                <i class="fa fa-plus"></i>
            </a>
        </p>
    @endif
@stop

@section('body')
    <section class="col-sm-12">
        @if ($users->count())
            <table class="table table-hover">
                <thead class="bg-primary">
                <tr>
                    <th>المستخدم</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="col-md-9"><a href="{{route('user.edit',$user)}}">{{$user->name}}</a></td>
                        <td>
                            <form action="{{route('user.destroy',$user)}}" method="POST">
                                {{csrf_field()}} {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-xs btn-warning"><i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        @else
            <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> <strong>لا يوجد مستخدمين على
                    النظام</strong>
            </div>
        @endif
    </section>
@stop
