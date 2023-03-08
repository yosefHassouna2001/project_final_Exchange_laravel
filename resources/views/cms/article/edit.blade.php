@extends('cms.parent')

@section('title' , 'الخبر')

@section('main-title' , 'تعديل الخبر')

@section('sub-title' , 'تعديل الخبر')

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
                <h3 class="card-title" style="float: right !important">تعديل بيانات الخبر</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="title">عنوان الخير </label>
                            <input type="text" class="form-control" id="title"
                            value="{{ $articles->title }}" name="title" placeholder="ادخل عنوان الخبر">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image">الصورة </label>
                            <input type="file" class="form-control" id="image" name="image"
                            value="{{ $articles->image }}" placeholder="ادخل صورة الخبر ">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="short_description">الوصف المختصر</label>
                            <input type="text" class="form-control" id="short_description"
                            value="{{ $articles->short_description }}" name="short_description" placeholder="ادخل الوصف المختصر">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="full_description"> الوصف الكامل </label>
                                <textarea class="form-control" style="resize: none;" id="full_description" name="full_description" rows="4"
                                placeholder="ادخل الوصف الكامل" cols="50">{{ $articles->full_description }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$articles->id}})" class="btn btn-primary">تحديث <i class="fa-solid fa-arrows-rotate"></i></button>
                    <a href="{{route('articles.index')}}" type="button" class="btn btn-secondary">قائمة الاخبار <i class="fa-solid fa-newspaper"></i></a>

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
    <script>
        function performUpdate(id){

        let formData = new FormData();

        formData.append('title',document.getElementById('title').value);
        formData.append('short_description',document.getElementById('short_description').value);
        formData.append('full_description',document.getElementById('full_description').value);
        formData.append('image',document.getElementById('image').files[0]);

        storeRoute('/cms/admin/update-articles/' +id , formData);
    }

    </script>
@endsection
