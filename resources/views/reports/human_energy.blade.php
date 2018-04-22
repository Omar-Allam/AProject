@extends('layout.app')

@section('header')
    <h4>الطاقة البشرية</h4>
    <p>
        {{--<a class="btn btn-sm btn-success"  href="{{route('exemption.create')}}">--}}
        {{--<i class="fa fa-plus"></i>--}}
        {{--</a>--}}
    </p>
@stop

@section('body')
    <section class="col-sm-12">
        <table class="table table-hover table-striped">
            <thead class="bg-primary">
            <tr >
                <th>الفعلي ( ظباط )</th>
                <th>شاغر ( ظباط )</th>
                <th>مجمد ( ظباط )</th>
                <th>مكتسب ( ظباط )</th>
                <th>مفرز ( ظباط )</th>
            </tr>

            </thead>
            <tbody>
            <tr>
                <td>{{\App\FormationSoldiers::human_energy()['officer_total']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['free_officers']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['freezed_officers']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['gained_officers']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['gained_officers']}}</td>
            </tr>
            </tbody>
        </table>


        <table class="table table-hover table-striped">
            <thead class="bg-primary">

            <tr>
                <th>الفعلي ( أفراد )</th>
                <th>شاغر ( أفراد )</th>
                <th>مجمد ( أفراد )</th>
                <th>مكتسب ( أفراد )</th>
                <th>مفرز ( أفراد )</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{\App\FormationSoldiers::human_energy()['soldier_total']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['free_soldiers']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['freezed_soldiers']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['gained_soldiers']}}</td>
                <td>{{\App\FormationSoldiers::human_energy()['sortable_soldiers']}}</td>
            </tr>

            </tbody>
        </table>



    </section>
    {{$soldiers->links()}}
@stop
