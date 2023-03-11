@extends('cms.parent')

@section('title',' مدير النظام')

@section('main-title' , 'تغيير كلمة المرور ')

@section('sub-title' ,'تغيير كلمة المرور ')

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
                        <h3 class="card-title" style="float: right !important">تغيير كلمة مرور المشرف</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">كلمة المرور الحالية</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder=" ادخل كلمة المرور الحالية ">
                                </div>
                                <div class="form-group col-md-6">
                                </div>

                                <br>
                                <div class="form-group col-md-6">
                                    <label for="new_password">كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control" id="new_password"
                                    placeholder=" ادخل كلمة المرور الجديدة ">
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                                <br>
                                <div class="form-group col-md-6">
                                    <label for="new_password_confirmation"> تأكيد كلمة المرور</label>
                                    <input type="password"  class="form-control" id="new_password_confirmation"
                                placeholder=" ادخل كلمة المرور الجديدة ">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update()" class="btn btn-success">تعديل <i class="fa-solid fa-arrows-rotate"></i></button>
                            <a href="{{route('admins.index')}}"><button type="button" class="btn btn-info">
                                    قائمة المشرفين <i class="fa-solid fa-user-gear ml-2"></i></button></a>
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




    function update(){

        let formData = new FormData();
            formData.append('password',document.getElementById('password').value);
            formData.append('new_password',document.getElementById('new_password').value);
            formData.append('new_password_confirmation',document.getElementById('new_password_confirmation').value);


            storeRoute('/cms/admin/update-password', formData );

    }

</script>


@endsection
