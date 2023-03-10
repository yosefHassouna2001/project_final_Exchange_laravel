@extends('cms.parent')

@section('title' , 'المدينة')

@section('main-title' , 'معلومات المدينة')

@section('sub-title' , 'معلومات المدنية')

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
                <h3 class="card-title" style="float: right !important"> معلومات المدينة</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>الدولة</label>
                            <select class="form-control select2" id="country_id" disabled name="country_id" style="width: 100%;">
                                @foreach ($countries as $country )
                                <option @if ($country->id == $cities->country_id) selected @endif value="{{ $country->id }}">
                                            {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">اسم المدينة</label>
                            <input type="text" class="form-control" id="name" name="name" disabled
                                value="{{ $cities->name }}" placeholder="أدخل اسم المدينة">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="street">الشارع</label>
                            <input type="text" class="form-control" id="street" name="street" disabled
                            value="{{$cities->street}}" placeholder="أدخل اسم الشارع">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                    <a href="{{ route('restore-cities' , $cities->id) }}" type="button"
                        @if($cities->deleted_at == null)
                            hidden
                        @endif
                        class="btn btn-success">استرجاع &#x21BA;
                    </a>

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

@endsection
