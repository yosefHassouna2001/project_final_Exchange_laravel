@extends('cms.parent')

@section('title' , 'الفرع')

@section('main-title' , 'معلومات الفرع')

@section('sub-title' , 'معلومات الفرع')

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
                <h3 class="card-title" style="float: right !important"> معلومات الفرع</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>المدينة</label>
                            <select class="form-control select2" disabled id="city_id" name="city_id" style="width: 100%;">
                                @foreach($cities as $city)
                                <option @if ($city->id == $branches->city_id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-md-6">
                            <label for="address">عنوان الفرع </label>
                            <input type="text" class="form-control" id="address" disabled
                            value="{{ $branches->address }}" name="address" placeholder="أدخل العنوان">
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-md-6">
                            <label for="phone">الهاتف</label>
                            <input type="text" class="form-control" id="phone" disabled
                            value="{{ $branches->phone }}" name="phone" placeholder="أدخل رقم الهاتف">
                        </div>
                        <!-- /.col -->
                        <div class="form-group col-md-6">
                            <label for="email">الايميل</label>
                            <input type="email" class="form-control" id="email" disabled
                            value="{{ $branches->email }}" name="email" placeholder="أدخل الايميل ">
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                    <a href="{{ route('restore-branches' , $branches->id) }}" type="button"
                        @if($branches->deleted_at == null)
                            hidden
                        @endif
                        class="btn btn-success">استرجاع &#x21BA;
                    </a>

                    <a href="{{route('branches.index')}}" type="button" class="btn btn-secondary">قائمة الفروع <i class="fa-solid fa-tree-city ml-2"></i></a>

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

@endsection
