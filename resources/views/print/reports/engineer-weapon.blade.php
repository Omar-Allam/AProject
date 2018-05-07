@extends('layout.print')

@section('header')

@stop

@section('body')

    <section class="col-sm-12">
        <div class="row text-center">

            <h4>املاك</h4>


        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr class="bg-warning text-center">
                <td colspan="2"> حسب التشكيل</td>
                <td colspan="2"> الشاغر</td>
                <td colspan="2"> المجمد</td>
                <td colspan="2"> الموجود الفعلي</td>
                <td colspan="2"></td>
            </tr>
            <tr class="bg-primary text-center">
                <th>ضباط</th>
                <th>أفراد</th>

                <th>ضباط</th>
                <th>أفراد</th>

                <th>ضباط</th>
                <th>أفراد</th>

                <th>ضباط</th>
                <th>أفراد</th>

                <th>النسبة</th>
                <th>الملاحظات</th>


            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{\App\FormationSoldiers::human_energy(range(8,12),range(1,4))}}
                </td>
                <td>
                    {{\App\FormationSoldiers::human_energy(range(1,7),range(1,4))}}

                </td>

                <td>
                    {{\App\FormationSoldiers::human_energy(range(8,12),range(1,1))}}
                </td>
                <td>
                    {{\App\FormationSoldiers::human_energy(range(1,7),range(1,1))}}
                </td>

                <td>
                    {{\App\FormationSoldiers::human_energy(range(8,12),range(2,2))}}
                </td>
                <td>
                    {{\App\FormationSoldiers::human_energy(range(1,7),range(2,2))}}
                </td>

                <td>


                </td>
                <td>

                </td>

                <td>

                </td>

                <td>
                    <input type="text" class="form-control">
                </td>


            </tr>
            </tbody>
        </table>

        <h4>النقص</h4>

        <table class="table table-hover table-bordered">
            <thead>

            <tr class="bg-warning text-center">
                <th rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">الرتبة /
                    الإختصاص
                </th>
                <th rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">المهندسين</th>
                <th colspan="10" class="text-center">أسلحــــــة أخــــــرى</th>
                <th rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">ملاحظات</th>
            </tr>
            <tr class="bg-info text-center">
                <th>مشاة</th>
                <th>مدرعات</th>
                <th>شئون دينية</th>
                <th>إشارة</th>
                <th>إستخبارات وأمن</th>
                <th>تموين</th>
                <th>نقل</th>
                <th>طبابة</th>
                <th>مساحة</th>
                <th>المجموع</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>ضابط</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(8,12),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>

            </tr>
            <tr>
                <th>رئيس رقباء</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(7,7),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>

            </tr>
            <tr>
                <th>رقيب أول</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(6,6),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>
            </tr>
            <tr>
                <th>رقيب</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(5,5),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>
            </tr>
            <tr>
                <th>وكيل رقيب</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(4,4),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>
            </tr>
            <tr>
                <th>عريف</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(3,3),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>
            </tr>

            <tr>
                <th>جندي أول</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(2,2),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>
            </tr>
            <tr>
                <th>جندي</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,1),range(1,11))}}</th>
                <th><input type="text" class="form-control"></th>
            </tr>
            <tr class="bg-success">
                <th>المجموع</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(10,10))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(1,1))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(2,2))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(3,3))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(4,4))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(5,5))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(7,7))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(8,8))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(9,9))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(6,6))}}</th>
                <th>{{\App\SoldierIdentity::engineerWeapon(range(1,12),range(1,11))}}</th>
                <th></th>

            </tr>

            </tbody>
        </table>

        <h4>التنقلات والتعيين وإنهاء الخدمة</h4>

        <table class="table   table-bordered">
            <thead>
            <tr class="bg-warning text-center">
                <td>التسلسل</td>
                <td colspan="2"> عدد المنقولين على الوحدة</td>
                <td colspan="2"> عدد المعينين على الوحدة</td>
                <td colspan="2">عدد المنهاة خدماتهم</td>
                <td colspan="2">عدد المعادين</td>
                <td colspan="2">عدد المنقولين خارج الوحدة</td>
                <td>ملاحظات</td>
            </tr>

            </thead>
            <tbody>
            <tr class="bg-primary text-center">
                <th>1</th>
                <th>ضباط</th>
                <th>{{\App\FormationSoldiers::tranfer(range(8,12),1)}}</th>

                <th>ضباط</th>
                <th>{{\App\FormationSoldiers::tranfer(range(8,12),2)}}</th>

                <th>ضباط</th>
                <th>{{\App\FormationSoldiers::tranfer(range(8,12),3)}}</th>

                <th>ضباط</th>
                <th>{{\App\FormationSoldiers::tranfer(range(8,12),4)}}</th>

                <th>ضباط</th>
                <th>{{\App\FormationSoldiers::tranfer(range(8,12),5)}}</th>

                <th><input type="text" class="form-control"></th>

            </tr>
            <tr class="bg-primary text-center">
                <th>2</th>
                <th>أفراد</th>
                <th>{{\App\FormationSoldiers::tranfer(range(1,7),1)}}</th>

                <th>أفراد</th>
                <th>{{\App\FormationSoldiers::tranfer(range(1,7),2)}}</th>

                <th>أفراد</th>
                <th>{{\App\FormationSoldiers::tranfer(range(1,7),3)}}</th>

                <th>أفراد</th>
                <th>{{\App\FormationSoldiers::tranfer(range(1,7),4)}}</th>

                <th>أفراد</th>
                <th>{{\App\FormationSoldiers::tranfer(range(1,7),5)}}</th>

                <th><input type="text" class="form-control"></th>

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