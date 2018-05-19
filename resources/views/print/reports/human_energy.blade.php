@extends('layout.print')

@section('header')
    <p>
        {{--<a class="btn btn-sm btn-success"  href="{{route('exemption.create')}}">--}}
        {{--<i class="fa fa-plus"></i>--}}
        {{--</a>--}}

    </p>
@stop

@section('body')
    <div class="row text-center">
        <h4><b>الطاقة البشرية</b></h4>
    </div>
    <br>
    <section class="col-sm-12">
        <table class="table table-bordered">
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

        <table class="table table-bordered">
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
@stop

@section('scripts')
    <script>
        window.print()
    </script>
@endsection