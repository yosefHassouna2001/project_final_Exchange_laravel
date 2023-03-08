@extends('cms.parent')

@section('title' , 'الفرع')

@section('main-title' , 'تعديل الفرع')

@section('sub-title' , 'تعديل الفرع')

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
                <h3 class="card-title" style="float: right !important">تعديل بيانات الفرع</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>المدينة</label>
                            <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                                @foreach($cities as $city)
                                <option @if ($city->id == $branches->city_id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-md-6">
                            <label for="address">عنوان الفرع </label>
                            <input type="text" class="form-control" id="address"
                            value="{{ $branches->address }}" name="address" placeholder="أدخل العنوان">
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-md-6">
                            <label for="phone">الهاتف</label>
                            <input type="text" class="form-control" id="phone"
                            value="{{ $branches->phone }}" name="phone" placeholder="أدخل رقم الهاتف">
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-md-6">
                            <label for="email">الايميل</label>
                            <input type="email" class="form-control" id="email"
                            value="{{ $branches->email }}" name="email" placeholder="أدخل الايميل ">
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$branches->id}})" class="btn btn-primary">تحديث <i class="fa-solid fa-arrows-rotate"></i></button>
                    <a href="{{route('branches.index')}}" type="button" class="btn btn-secondary">قائمة الفروع <i class="fa-solid fa-code-branch"></i></a>

                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section  >

@endsection


@section('scripts')
    <script>
        function performUpdate(id){

        let formData = new FormData();

        formData.append('address',document.getElementById('address').value);
        formData.append('phone',document.getElementById('phone').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('city_id',document.getElementById('city_id').value);

        storeRoute('/cms/admin/update-branches/' +id , formData);
    }

</script>
@endsection
