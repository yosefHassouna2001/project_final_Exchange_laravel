@extends('cms.parent')

@section('title' , 'الدولة')

@section('main-title' , 'اضافة دولة')

@section('sub-title' , 'اضافة دولة')

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
                <h3 class="card-title" style="float: right !important">اضافة دولة</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="name">اسم الدولة </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="أدخل اسم الدولة">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="code">الكود</label>
                        <input type="number" class="form-control" id="code" name="code" placeholder="أدخل كود الدولة">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-success">حفظ</button>
                    <a href="{{ route('countries.index') }}" type="button" class="btn btn-info"> قائمة الدول</a>
                </div>
                </form>
            </div>
            <!-- /.card -->
            </div>
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
        formData.append('code',document.getElementById('code').value);

        store('/cms/admin/countries' , formData);
        }

    </script>
@endsection
