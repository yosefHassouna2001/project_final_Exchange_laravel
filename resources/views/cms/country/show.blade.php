@extends('cms.parent')

@section('title' , 'الدولة')

@section('main-title' , 'معلومات الدولة')

@section('sub-title' , 'معلومات الدولة')

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
                <h3 class="card-title" style="float: right !important"> معلومات الدولة</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                        <label for="name">اسم الدولة</label>
                        <input type="text" class="form-control" id="name" name="name" disabled
                            value="{{ $countries->name }}" placeholder="أدخل اسم الدولة">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="code">الكود</label>
                        <input type="text" class="form-control" id="code" name="code" disabled
                        value="{{$countries->code}}" placeholder="أدخل كود الدولة">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('restore-countries' , $countries->id) }}" type="button"
                        @if($countries->deleted_at == null)
                            hidden
                        @endif
                        class="btn btn-success">استرجاع &#x21BA;
                    </a>
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

@endsection
