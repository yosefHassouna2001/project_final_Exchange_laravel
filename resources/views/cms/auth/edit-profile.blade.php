{{-- @extends('dashboard.parent') --}}
@extends('cms.parent')

@section('title' , 'المشرفين')

@section('main-title' , 'تعديل المشرف')

@section('sub-title' , 'تعديل المشرف')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title" style="float: right !important">تعديل بيانات المشرف</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">الاسم الاول</label>
                                    <input type="text" class="form-control" id="first_name"
                                    value="{{ $admins->user->first_name }}" name="first_name" placeholder="اخل الاسم الاول">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">الاسم الثاني</label>
                                    <input type="text" class="form-control" id="last_name"
                                    value="{{ $admins->user->last_name }}" name="last_name" placeholder="ادخل الاسم الثاني">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">الايميل</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $admins->email}}" placeholder="ادهل الايمبل">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="mobile">رقم الهاتف</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                    value="{{ $admins->user->mobile }}" placeholder="ادهل رقم الهاتف">
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="address">عنوان الادمن</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $admins->user->address }}" placeholder="ادخل العنوان">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">الجنس</label>
                                    <select class="form-control form-select-sm" name="gender" style="width: 100%;"
                                            id="gender" aria-label=".form-select-sm example">
                                            <option selected> {{ $admins->user->gender }} </option>
                                            <option value="male">ذكر </option>
                                            <option value="female">انثى </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="status"> الحالة</label>
                                    <select class="form-control form-select-sm" name="status" style="width: 100%;"
                                            id="status" aria-label=".form-select-sm example">
                                            <option selected> {{ $admins->user->status }} </option>
                                            <option value="active">فعال </option>
                                            <option value="inactive">غير فعال </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>المدينة</label>
                                    <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="date">تاريخ الميلاد </label>
                                    <input type="date" class="form-control" id="date" name="date"
                                    value="{{ $admins->user->date }}" placeholder="ادخل تريخ الميلاد">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="image">تعديل صورة شخصية</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Date of Admin">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update()" class="btn btn-success">تعديل <i class="fa-solid fa-arrows-rotate"></i></button>
                            <a href="{{route('admins.index')}}" type="button" class="btn btn-info">
                                    قائمة المشرفين <i class="fa-solid fa-user-gear ml-2"></i> </a>
                        </div>

                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')


<script>

$('.city_id').select2({
      theme: 'bootstrap4'
    })


    function update(){

        let formData = new FormData();

            formData.append('first_name',document.getElementById('first_name').value);
            formData.append('last_name',document.getElementById('last_name').value);
            formData.append('status',document.getElementById('status').value);
            formData.append('gender',document.getElementById('gender').value);
            formData.append('date',document.getElementById('date').value);
            formData.append('city_id',document.getElementById('city_id').value);
            formData.append('address',document.getElementById('address').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('image',document.getElementById('image').files[0]);
            // formData.append('role_id',document.getElementById('role_id').value);

            storeRoute('/cms/admin/update-profile' , formData );
    }

</script>


@endsection
