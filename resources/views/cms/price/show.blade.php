@extends('cms.parent')

@section('title' , 'السعر')

@section('main-title' , 'معلومات السعر')

@section('sub-title' , 'معلومات السعر')

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
                <h3 class="card-title" style="float: right !important"> معلومات السعر</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                {{-- formData.append('buy_price',document.getElementById('buy_price').value);
                formData.append('sale_price',document.getElementById('sale_price').value);
                formData.append('currency_id',document.getElementById('currency_id').value); --}}

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>العملة</label>
                            <select class="form-control select2" id="currency_id" disabled name="currency_id" style="width: 100%;">
                                @foreach ($currencies as $currency )
                                <option @if ($currency->id == $prices->currency_id) selected @endif value="{{ $currency->id }}">
                                            {{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sale_price">سعر البع</label>
                            <input type="text" class="form-control" id="sale_price" name="sale_price" disabled
                                value="{{ $prices->sale_price }}" placeholder="أدخل سعر البع ">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="buy_price">سعر الشراء</label>
                            <input type="text" class="form-control" id="buy_price" name="buy_price" disabled
                            value="{{$prices->buy_price}}" placeholder="أدخل سعر الشراء ">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                    <a href="{{ route('restore-prices' , $prices->id) }}" type="button"
                        @if($prices->deleted_at == null)
                            hidden
                        @endif
                        class="btn btn-success">استرجاع &#x21BA;
                    </a>

                    <a href="{{route('prices.index')}}" type="button" class="btn btn-secondary">قائمة الاسعار <i class="fa-solid fa-tree-city ml-2"></i></a>

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
