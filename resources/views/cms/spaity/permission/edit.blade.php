@extends('cms.parent')

@section('title' , 'الصلاحيات')

@section('main-title' , 'تعديل الصلاحية')

@section('sub-title' , 'تعديل الصلاحية')

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
                <h3 class="card-title" style="float: right !important">تعديل بيانات الصلاحية</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">


                <div class="form-group col-md-6" hidden>
                    <label for="guard_name">اسم المشرف </label>
                    <select class="form-select form-select-sm" name="guard_name" style="width: 100%;"
                        id="guard_name" aria-label=".form-select-sm example">
                    {{-- <option value="admin" @if($permissions->guard_name == 'admin') selected @endif>Admin</option> --}}
                    <option value="{{ $permissions->guard_name }}" selected >ادمن</option>
                    </select>
                </div>
                    <div class="form-group">
                    <label for="name">اسم الصلاحية </label>
                    <input type="text" class="form-control" id="name" name="name"
                    value="{{ $permissions->name }}" placeholder="ادخل اسم الصلاحية">
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$permissions->id}})" class="btn btn-primary">تحديث <i class="fa-solid fa-arrows-rotate"></i></button>
                    <a href="{{route('permissions.index')}}" type="button" class="btn btn-secondary">قائمة الصلاحيات <i class="fa-solid fa-tree-city ml-2"></i></a>

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
    {{-- <script>
        function performUpdate(id){

        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('guard_name',document.getElementById('guard_name').value);

        storeRoute('/cms/admin/permissions-update/'+id , formData);
        }

    </script> --}}

<script>
    function performUpdate(id){

    let formData = new FormData();

    formData.append('name',document.getElementById('name').value);
    formData.append('guard_name',document.getElementById('guard_name').value);

    storeRoute('/cms/admin/permissions-update/' +id , formData);
}

</script>
@endsection
