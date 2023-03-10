@extends('cms.parent')

@section('title' , 'السؤال')

@section('main-title' , 'تعديل السؤال')

@section('sub-title' , 'تعديل السؤال')

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
                <h3 class="card-title" style="float: right !important">تعديل بيانات السؤال</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="title"> السؤال </label>
                            <input type="text" class="form-control" id="title" name="title"
                            value="{{ $questions->title }}" placeholder="أدخل السؤال">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">  الجواب </label>
                                <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                placeholder="ادخل الجواب الكامل" cols="50">{{ $questions->description }}"</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{$questions->id}})" class="btn btn-primary">تحديث <i class="fa-solid fa-arrows-rotate"></i></button>
                    <a href="{{route('questions.index')}}" type="button" class="btn btn-secondary">قائمة الاسئلة <i class="fa-solid fa-tree-city ml-2"></i></a>

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
        formData.append('description',document.getElementById('description').value);

        storeRoute('/cms/admin/update-questions/' +id , formData);
    }

    </script>
@endsection
