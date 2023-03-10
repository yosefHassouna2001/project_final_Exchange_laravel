@extends('cms.parent')

@section('title' , 'العملة')

@section('main-title' , 'معلومات العملة')

@section('sub-title' , 'معلومات العملة')

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
                <h3 class="card-title" style="float: right !important"> معلومات العملة</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row align-items-center " >
                        <div class="form-group col-md-12">
                            <img class="img-circled img-bordered-sm" src="{{asset('storage/images/currency/'.$currencies->image ?? "")}}" width="100" height="100" alt="User Image">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">اسم الدولة</label>
                            <input type="text" class="form-control" id="name" name="name" disabled
                                value="{{ $currencies->name }}" placeholder="أدخل اسم العملة">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('restore-currencies' , $currencies->id) }}" type="button"
                        @if($currencies->deleted_at == null)
                            hidden
                        @endif
                        class="btn btn-success">استرجاع &#x21BA;
                    </a>
                    <a href="{{route('currencies.index')}}" type="button" class="btn btn-secondary">قائمة العملات</a>

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
