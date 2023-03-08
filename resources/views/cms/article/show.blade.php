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
                            <label for="title">عنوان الخير </label>
                            <input type="text" class="form-control" id="title" disabled
                            value="{{ $articles->title }}" name="title" placeholder="ادخل عنوان الخبر">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="short_description">الوصف المختصر</label>
                            <input type="text" class="form-control" id="short_description" disabled
                            value="{{ $articles->short_description }}" name="short_description" placeholder="ادخل الوصف المختصر">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="full_description"> الوصف الكامل </label>
                            <textarea class="form-control" disabled style="resize: none;" id="full_description" name="full_description" rows="4"
                            placeholder="ادخل الوصف الكامل" cols="50">{{ $articles->full_description }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">الصورة </label>
                            <br>
                            <img class=" w-50 h-75 img-bordered-sm" src="{{asset('storage/images/article/'.$articles->image)}}" width="60" height="60" alt=" صورة الخبر">

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('restore-articles' , $articles->id) }}" type="button"
                        @if($articles->deleted_at == null)
                            hidden
                        @endif
                        class="btn btn-success">استرجاع &#x21BA;
                    </a>
                    <a href="{{route('articles.index')}}" type="button" class="btn btn-secondary">قائمة الاخبار</a>

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
