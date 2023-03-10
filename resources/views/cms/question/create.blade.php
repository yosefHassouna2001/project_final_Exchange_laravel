@extends('cms.parent')

@section('title' , 'الاسئلة')

@section('main-title' , 'اضافة سؤال')

@section('sub-title' , 'اضافة سؤال')

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
                <h3 class="card-title" style="float: right !important">اضافة سؤال</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="title"> السؤال </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="أدخل السؤال">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">  الجواب </label>
                                <textarea class="form-control" style="resize: none;" id="description" name="description" rows="4"
                                placeholder="ادخل الجواب الكامل" cols="50"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performStore()" class="btn btn-success">حفظ</button>
                    <a href="{{ route('questions.index') }}" type="button" class="btn btn-info"> قائمة الاسئلة <i class="fa-solid fa-tree-city ml-2"></i></a>
                </div>
                </form>
            </div>
            <!-- /.card -->
            </div>
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection


@section('scripts')
    <script>
        function performStore(){

        let formData = new FormData();
        formData.append('title',document.getElementById('title').value);
        formData.append('description',document.getElementById('description').value);

        store('/cms/admin/questions' , formData);
        }

    </script>
@endsection
