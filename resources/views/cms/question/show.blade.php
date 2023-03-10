@extends('cms.parent')

@section('title' , ' الاسئلة')

@section('main-title' , 'قائمة الاسئلة')

@section('sub-title' , 'قائمة الاسئلة')

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
                <h3 class="card-title" style="float: right !important">عرض بيانات السؤال</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="title"> السؤال </label>
                            <input type="text" class="form-control" id="title" name="title" disabled
                            value="{{ $questions->title }}" placeholder="أدخل السؤال">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">  الجواب </label>
                                <textarea class="form-control" disabled style="resize: none;" id="description" name="description" rows="4"
                                placeholder="ادخل الجواب الكامل" cols="50">{{ $questions->description }}"</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('restore-questions' , $questions->id) }}" type="button"
                        @if($questions->deleted_at == null)
                            hidden
                        @endif
                        class="btn btn-success">استرجاع &#x21BA;
                    </a>
                    <a href="{{route('questions.index')}}" type="button" class="btn btn-secondary">قائمة الاسئلة</a>

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
