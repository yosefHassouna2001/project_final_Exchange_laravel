@extends('cms.parent')

@section('title' , 'السعر')

@section('main-title' , 'اضافة السعر')

@section('sub-title' , 'اضافة السعر')

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
                <h3 class="card-title" style="float: right !important">اضافة السعر</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                    <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>العملة</label>
                            <select class="form-control select2" id="currency_id" name="currency_id" style="width: 100%;">
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    <!-- /.col -->
                        <div class="form-group col-md-4">
                            <label for="sale_price">سعر البيع  </label>
                            <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="أدخل  سعر البيع">
                        </div>
                    <!-- /.col -->
                        <div class="form-group col-md-4">
                            <label for="buy_price">سعر الشراء</label>
                            <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="أدخل سعر الشراء ">
                        </div>
                    <!-- /.col -->
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-success">حفظ</button>
                    <a href="{{ route('prices.index') }}" type="button" class="btn btn-info"> قائمة الاسعار <i class="fa-solid fa-tree-city ml-2"></i></a>
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
        formData.append('buy_price',document.getElementById('buy_price').value);
        formData.append('sale_price',document.getElementById('sale_price').value);
        formData.append('currency_id',document.getElementById('currency_id').value);

        store('/cms/admin/prices' , formData);
    }

    </script>
@endsection
