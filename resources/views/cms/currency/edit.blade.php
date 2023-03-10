@extends('cms.parent')

@section('title' , 'العملة')

@section('main-title' , 'تعديل العملة')

@section('sub-title' , 'تعديل العملة')

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
                <h3 class="card-title" style="float: right !important">تعديل بيانات العملة</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">اسم العملة</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $currencies->name }}" placeholder="أدخل اسم الدولة">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">اختر صورة  </label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="ادخل علم دولة العملة">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$currencies->id}})" class="btn btn-primary">تحديث <i class="fa-solid fa-arrows-rotate"></i></button>
                    <a href="{{route('currencies.index')}}" type="button" class="btn btn-secondary">قائمة العملات <i class="fa-solid fa-tree-city ml-2"></i></a>

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
        function performUpdate(id){

        let formData = new FormData();

        formData.append('name',document.getElementById('name').value);
        formData.append('image',document.getElementById('image').files[0]);

        storeRoute('/cms/admin/update-currencies/' +id , formData);
    }

    </script>
@endsection
