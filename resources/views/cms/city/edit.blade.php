@extends('cms.parent')

@section('title' , 'المدينة')

@section('main-title' , 'تعديل المدينة')

@section('sub-title' , 'تعديل المدنية')

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
                <h3 class="card-title" style="float: right !important">تعديل بيانات المدينة</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>الدولة</label>
                            <select class="form-control select2" id="country_id" name="country_id" style="width: 100%;">
                                @foreach ($countries as $country )
                                <option @if ($country->id == $cities->country_id) selected @endif value="{{ $country->id }}">
                                            {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">اسم المدينة</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $cities->name }}" placeholder="أدخل اسم المدينة">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="street">الشارع</label>
                            <input type="text" class="form-control" id="street" name="street"
                            value="{{$cities->street}}" placeholder="أدخل اسم الشارع">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$cities->id}})" class="btn btn-primary">تحديث <i class="fa-solid fa-arrows-rotate"></i></button>
                    <a href="{{route('cities.index')}}" type="button" class="btn btn-secondary">قائمة المدن <i class="fa-solid fa-tree-city ml-2"></i></a>

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

        formData.append('name',document.getElementById('name').value);
        formData.append('street',document.getElementById('street').value);
        formData.append('country_id',document.getElementById('country_id').value);

        storeRoute('/cms/admin/update-cities/' +id , formData);
    }

</script>
@endsection
