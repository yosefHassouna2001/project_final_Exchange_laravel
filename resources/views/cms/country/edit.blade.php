@extends('cms.parent')

@section('title' , 'الدولة')

@section('main-title' , 'تعديل الدولة')

@section('sub-title' , 'تعديل الدولة')

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
                <h3 class="card-title" style="float: right !important">تعديل بيانات الدولة</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="name">اسم الدولة</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $countries->name }}" placeholder="أدخل اسم الدولة">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="code">الكود</label>
                        <input type="text" class="form-control" id="code" name="code"
                        value="{{$countries->code}}" placeholder="أدخل كود الدولة">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$countries->id}})" class="btn btn-primary">تحديث</button>
                    <a href="{{route('countries.index')}}" type="button" class="btn btn-secondary">قائمة الدول</a>

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
        formData.append('code',document.getElementById('code').value);

        storeRoute('/cms/admin/update-countries/' +id , formData);
    }

    </script>
@endsection
