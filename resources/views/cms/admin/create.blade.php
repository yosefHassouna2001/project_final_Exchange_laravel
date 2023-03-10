@extends('cms.parent')

@section('title' , 'المشرفين')

@section('main-title' , 'اضافة مشرف')

@section('sub-title' , 'اضافة مشرف')

@section('styles')

@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title" style="float: right !important">اضافة مشرف</h3>

            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

                <div class="card-body">


                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="first_name">الاسم الاول</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="اخل الاسم الاول">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">الاسم الثاني</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="ادخل الاسم الثاني">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">الايميل</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="ادهل الايمبل">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password"> كلمة المرور</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password of Admin">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="mobile">رقم الهاتف</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="ادهل رقم الهاتف">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">عنوان الادمن</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="ادخل العنوان">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="gender">الجنس</label>
                        <select name="gender" class="form-control" id="gender"
                        aria-label=".form-select-sm example">
                            <option disabled selected value="">اختر ..</option>
                            <option value="ذكر">Male</option>
                            <option value="انثى">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">الحالة</label>
                        <select name="status" class="form-control" id="status"
                        aria-label=".form-select-sm example">
                            <option disabled selected value="">اختر ..</option>
                            <option value="فعال">فعال</option>
                            <option value="غير فعال">غير فعال</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>المدينة</label>
                        <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date">تاريخ الميلاد</label>
                        <input type="date" class="form-control" id="date" name="date" placeholder="Enter Date of Admin">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="image">اختر صورة  </label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter Date of Admin">
                    </div>

                    <div class="form-group col-md-6">
                    <label>الدور</label>
                    <select class="form-control select2" id="role_id" name="role_id" style="width: 100%;">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                    </select>
                    </div>
                </div>

                <!-- /.card-body -->

            </div>
                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-success">حفظ</button>
                    <a href="{{ route('admins.index') }}" type="button" class="btn btn-info"> قائمة المشرفين <i class="fa-solid fa-user-gear ml-2"></i></a>
                </div>
                </form>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>

@endsection


@section('scripts')
  <script>
    function performStore(){

      let formData = new FormData();
      formData.append('first_name',document.getElementById('first_name').value);
      formData.append('last_name',document.getElementById('last_name').value);
      formData.append('status',document.getElementById('status').value);
      formData.append('gender',document.getElementById('gender').value);
      formData.append('date',document.getElementById('date').value);
      formData.append('city_id',document.getElementById('city_id').value);
      formData.append('address',document.getElementById('address').value);
      formData.append('email',document.getElementById('email').value);
      formData.append('password',document.getElementById('password').value);
      formData.append('mobile',document.getElementById('mobile').value);
      formData.append('image',document.getElementById('image').files[0]);
      formData.append('role_id',document.getElementById('role_id').value);

      store('/cms/admin/admins' , formData);
    }

  </script>
@endsection
