@extends('layout.app')

@section('header')

@stop

@section('body')
    <section class="col-sm-12">
        <h4>املاك</h4>

        <table class="table table-hover table-striped table-bordered">
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
                <td></td>
                <td></td>

                <td></td>
                <td></td>

                <td></td>
                <td></td>

                <td></td>
                <td></td>

                <td></td>

                <td></td>


            </tr>
            </tbody>
        </table>

        <h4>النقص</h4>

        <table class="table table-hover table-bordered">
            <thead>

            <tr class="bg-warning text-center">
                <th rowspan="2" class="text-center" style="vertical-align : middle;text-align:center;">الرتبة / الإختصاص</th>
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
                <th>ظابط</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>رئيس رقباء</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>رقيب أول</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>رقيب</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>وكيل رقيب</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>عريف</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>عريف</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>جندي أول</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>جندي</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr class="bg-success">
                <th>المجموع</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
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
                <td >ملاحظات</td>
            </tr>

            </thead>
            <tbody>
            <tr class="bg-primary text-center">
                <th>1</th>
                <th>ضباط</th>
                <th></th>

                <th>ضباط</th>
                <th></th>

                <th>ضباط</th>
                <th></th>

                <th>ضباط</th>
                <th></th>

                <th>ضباط</th>
                <th></th>

                <th></th>

            </tr>
            <tr class="bg-primary text-center">
                <th>2</th>
                <th>أفراد</th>
                <th></th>

                <th>أفراد</th>
                <th></th>

                <th>أفراد</th>
                <th></th>

                <th>أفراد</th>
                <th></th>

                <th>أفراد</th>
                <th></th>

                <th></th>

            </tr>
            </tbody>
        </table>



    </section>
@stop
