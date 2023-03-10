@extends('cms.parent')

@section('title' , 'الصلاحيات')

@section('main-title' , ' اضافة صلاحية')

@section('sub-title' , ' اضافة صلاحية')

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
                <h3 class="card-title" style="float: right !important">اضافة صلاحية للمشرف</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-md-6" hidden>
                            <label for="guard_name">اسم المشرف </label>
                            <select class="form-select form-select-sm" name="guard_name" style="width: 100%;"
                                id="guard_name" aria-label=".form-select-sm example">
                                <option value="admin" selected>ادمن </option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name">اسم الصلاحية </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ادخل اسم الصلاحية">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-success">حفظ</button>
                    <a href="{{ route('permissions.index') }}" type="button" class="btn btn-info"> قائمة الصلاحيات <i class="fa-solid fa-tree-city ml-2"></i></a>
                </div>
                </form>
            </div>
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
        formData.append('name',document.getElementById('name').value);
        formData.append('guard_name',document.getElementById('guard_name').value);

        store('/cms/admin/permissions' , formData);
        }

    </script>
@endsection
