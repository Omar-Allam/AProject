<div class="row">
    <div class="col-md-6">
        {{csrf_field()}}

        <div class="form-group {{$errors->has('name')? 'has-error' : ''}}">
            <label for="name"> الإسم </label>
            <input name="name" type="text" class="form-control" value="{{$user->name ?? ''}}">
            @if ($errors->has('name'))
                <div class="error-message" style="color: #ff8989">حقل مطلوب</div>
            @endif
        </div>

        <div class="form-group {{$errors->has('password')? 'has-error' : ''}}">
            <label for="password"> كلمة المرور </label>
            <input name="password" type="password" class="form-control">
            @if ($errors->has('password'))
                <div class="error-message" style="color: #ff8989">حقل مطلوب</div>
            @endif
        </div>
        <hr>
        <h4>الصلاحيات</h4>
        <div class="form-group {{$errors->has('password')? 'has-errors' : ''}}">
            <input type="checkbox"  id="admin" name="roles[1]" value="1" @if(isset($user) && $user->hasRole(1)) checked @endif >
            <label for="admin">مدير موقع</label>
        </div>
        <div class="form-group {{$errors->has('password')? 'has-errors' : ''}}">
            <p>هوية فرد</p>
            <input type="checkbox"  id="can_identity_read" name="roles[2]" value="2" @if(isset($user) &&  $user->hasRole(2)) checked @endif >
            <label for="can_identity_read">عرض</label>

            <input type="checkbox"  id="can_identity_edit" name="roles[3]" value="3" @if(isset($user) && $user->hasRole(3)) checked @endif >
            <label for="can_identity_edit">تعديل</label>

            <input type="checkbox"  id="can_identity_delete" name="roles[4]" value="4" @if(isset($user) && $user->hasRole(4)) checked @endif >
            <label for="can_identity_delete">حذف</label>
        </div>

        <div class="form-group {{$errors->has('password')? 'has-errors' : ''}}">
            <p>التشكيل</p>
            <input type="checkbox"  id="can_formation_view" name="roles[5]" value="5" @if(isset($user) && $user->hasRole(5)) checked @endif >
            <label for="can_formation_view">عرض</label>

            <input type="checkbox"  id="can_formation_edit" name="roles[6]" value="6" @if(isset($user) && $user->hasRole(6)) checked @endif >
            <label for="can_formation_edit">تعديل</label>

            <input type="checkbox"  id="can_formation_delete" name="roles[7]" value="7" @if(isset($user) && $user->hasRole(7)) checked @endif >
            <label for="can_formation_delete">حذف</label>
        </div>

        <div class="form-group {{$errors->has('password')? 'has-errors' : ''}}">
            <p>الإجازات</p>
            <input type="checkbox"  id="can_vacation_view" name="roles[8]" value="8" @if(isset($user) && $user->hasRole(8)) checked @endif >
            <label for="can_vacation_view">عرض</label>

            <input type="checkbox"  id="can_vacation_edit" name="roles[9]" value="9" @if(isset($user) && $user->hasRole(9)) checked @endif >
            <label for="can_vacation_edit">تعديل</label>

            <input type="checkbox"  id="can_vacation_delete" name="roles[10]" value="10" @if(isset($user) && $user->hasRole(10)) checked @endif >
            <label for="can_vacation_delete">حذف</label>
        </div>

        <div class="form-group {{$errors->has('password')? 'has-errors' : ''}}">
            <p>الإعفاءات</p>
            <input type="checkbox"  id="can_exemption_view" name="roles[11]" value="11" @if(isset($user) && $user->hasRole(11)) checked @endif >
            <label for="can_exemption_view">عرض</label>

            <input type="checkbox"  id="can_exemption_edit" name="roles[12]" value="12" @if(isset($user) && $user->hasRole(12)) checked @endif >
            <label for="can_exemption_edit">تعديل</label>

            <input type="checkbox"  id="can_exemption_delete" name="roles[13]" value="13" @if(isset($user) && $user->hasRole(13)) checked @endif >
            <label for="can_exemption_delete">حذف</label>
        </div>

        <div class="form-group {{$errors->has('password')? 'has-errors' : ''}}">
            <p> المستخدمين</p>
            <input type="checkbox"  id="can_users_view" name="roles[14]" value="14" @if(isset($user) && $user->hasRole(14)) checked @endif >
            <label for="can_users_view">عرض</label>

            <input type="checkbox"  id="can_users_edit" name="roles[15]" value="15" @if(isset($user) && $user->hasRole(15)) checked @endif >
            <label for="can_users_edit">تعديل</label>

            <input type="checkbox"  id="can_users_delete" name="roles[16]" value="16" @if(isset($user) && $user->hasRole(16)) checked @endif >
            <label for="can_users_delete">حذف</label>
        </div>

        <div class="form-group {{$errors->has('password')? 'has-errors' : ''}}">
            <p> التقارير</p>
            <input type="checkbox"  id="can_report_view" name="roles[17]" value="17" @if(isset($user) && $user->hasRole(14)) checked @endif >
            <label for="can_report_view">عرض</label>
        </div>

        <div class="form-group">
            <button class="btn btn-success"><i class="fa fa-check-circle"></i> حفظ</button>
        </div>
    </div>
</div>