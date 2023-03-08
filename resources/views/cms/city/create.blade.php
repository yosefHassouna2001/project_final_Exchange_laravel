@extends('cms.parent')

@section('title' , 'المدينة')

@section('main-title' , 'اضافة المدينة')

@section('sub-title' , 'اضافة المدينة')

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
                <h3 class="card-title" style="float: right !important">اضافة مدينة</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>الدولة</label>
                            <select class="form-control select2" id="country_id" name="country_id" style="width: 100%;">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    <!-- /.col -->
                        <div class="form-group col-md-4">
                            <label for="name">اسم المدينة </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="أدخل اسم المدينة">
                        </div>
                    <!-- /.col -->
                        <div class="form-group col-md-4">
                            <label for="street">الشارع</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="أدخل اسم الشارع">
                        </div>
                    <!-- /.col -->
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-success">حفظ</button>
                    <a href="{{ route('cities.index') }}" type="button" class="btn btn-info"> قائمة المدن <i class="fa-solid fa-tree-city ml-2"></i></a>
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

@endsection


@section('scripts')
    <script>
    function performStore(){

        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('street',document.getElementById('street').value);
        formData.append('country_id',document.getElementById('country_id').value);

        store('/cms/admin/cities' , formData);
    }

    </script>
@endsection
