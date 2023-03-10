@extends('cms.parent')

@section('title' , ' الاسئلة')

@section('main-title' , 'قائمة الاسئلة')

@section('sub-title' , 'قائمة الاسئلة')

@section('styles')

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">

                    <div class="card-header bg-transparent border-0">
                        <form action="" method="get" >
                            {{-- <div class="row">
                                <div class=" col-md-4">
                                    <button class="btn btn-success btn-md mb-1 " type="submit">فلتر البحث <i class="fa-solid fa-magnifying-glass"></i></button>
                                    <a href="{{route('countries.index')}}"  class="btn btn-danger mb-1">إنهاء البحث</a>

                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="text" class="form-control" placeholder="البحث باسم الدولة"
                                        name='name' @if( request()->name) value={{request()->name}} @endif/>
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="number" class="form-control" placeholder="البحث برقم الكود"
                                        name='code' @if( request()->code) value={{request()->code}} @endif/>
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>



                            </div> --}}
                            <div class="row mt-3">
                                <div class=" col-md-12 ">
                                    <a href="{{route('questions.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة سؤال جديد <i class="fas fa-plus nav-icon"></i></button></a>

                                    <a  href="{{ route('restoreindex-questions') }}" type="submit" class="btn btn-secondary ms-3 float-right ">سلة المحذوفات <i class="fas  fa-trash-alt"></i></a>
                                    <a  href="{{ route('questions.index') }}" type="submit" class="btn btn-success ml-3 float-right ">قائمة الاسئلة <i class="fa-solid fa-tree-city ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    {{-- <table class="table table-hover text-nowrap table-bordered"> --}}
                        <table class="table table-hover table-bordered table-striped text-nowrap text-center">

                    <thead>

                        <tr>
                        <th>#</th>
                        <th>السؤال </th>
                        <th>الجواب</th>
                        <th class="text-center">الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($questions as $question )
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{ $question->title }}</td>
                        <td>{{$question->description}}</td>
                        <td class="text-center">
                            <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                <a href="{{route('questions.show',$question->id)}}" type="button"
                                    class="btn btn-success mb-md-3 " title="Show">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="{{ route('questions.edit' , $question->id) }}" type="button"
                                    @if($question->deleted_at !== null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3   ">
                                <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('restore-questions' , $question->id) }}" type="button"
                                    @if($question->deleted_at == null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3 ">
                                    &#x21BA;
                                </a>
                                <a href="#" type="button" onclick="performDestroy({{ $question->id }} , this)" class="btn btn-danger mb-md-3">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
            <!-- /.card -->
            {{ $questions->links()}}
            </div>
        </div>

        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection


@section('scripts')
    <script>
    function performDestroy(id , referance){
        let url = '/cms/admin/questions/'+id;
        confirmDestroy(url , referance );
    }
    </script>
@endsection
