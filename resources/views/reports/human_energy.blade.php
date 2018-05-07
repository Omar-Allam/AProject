@extends('layout.app')

@section('header')
    <h4>الطاقة البشرية</h4>
    <p>
        {{--<a class="btn btn-sm btn-success"  href="{{route('exemption.create')}}">--}}
        {{--<i class="fa fa-plus"></i>--}}
        {{--</a>--}}
        <a type="button" href="{{route('human-energy.print')}}"
           class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
        </a>
    </p>
@stop

@section('body')
    <section class="col-sm-12">
        <table class="table table-hover table-striped">
            <thead class="bg-primary">
            <tr>
                <th>الفعلي ( ضباط )</th>
                <th>شاغر ( ضباط )</th>
                <th>مجمد ( ضباط )</th>
                <th>مكتسب ( ضباط )</th>
                <th>مفرز ( ضباط )</th>
            </tr>

            </thead>
            <tbody>
            <tr>
                <td>{{\App\FormationSoldiers::human_energy(range(8,12),range(1,4))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(8,12),range(1,1))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(8,12),range(2,2))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(8,12),range(3,3))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(8,12),range(4,4))}}</td>
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
                <td>{{\App\FormationSoldiers::human_energy(range(1,7),range(1,4))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(1,7),range(1,1))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(1,7),range(2,2))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(1,7),range(3,3))}}</td>
                <td>{{\App\FormationSoldiers::human_energy(range(1,7),range(4,4))}}</td>
            </tr>

            </tbody>
        </table>



    </section>
    {{$soldiers->links()}}
@stop
