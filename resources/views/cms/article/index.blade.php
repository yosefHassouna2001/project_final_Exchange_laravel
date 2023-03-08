@extends('cms.parent')

@section('title' , 'الخبر')

@section('main-title' , 'قائمة الاخبار')

@section('sub-title' , 'قائمة الاخبار')

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
                            <div class="row">
                                <div class=" col-md-4">
                                    <button class="btn btn-success btn-md" type="submit">فلتر البحث <i class="fa-solid fa-magnifying-glass"></i></button>
                                    <a href="{{route('articles.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="text" class="form-control" placeholder="البحث عن العنوان"
                                        name='title' @if( request()->title) value={{request()->title}} @endif/>
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="text" class="form-control" placeholder="البحث باستخدام الوصف"
                                        name='short_description' @if( request()->short_description) value={{request()->short_description}} @endif/>
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>



                            </div>
                            <div class="row mt-3">
                                <div class=" col-md-12 ">
                                    <a href="{{route('articles.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة خبر جديد <i class="fas fa-plus nav-icon"></i></button></a>

                                    <a  href="{{ route('restoreindex-articles') }}" type="submit" class="btn btn-secondary ms-3 float-right ">سلة المحذوفات <i class="fas  fa-trash-alt"></i></a>
                                    <a  href="{{ route('articles.index') }}" type="submit" class="btn btn-success ml-3 float-right">قائمة الاخبار <i class="fa-solid fa-tree-city ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                <table class="table table-hover table-bordered table-striped text-nowrap text-center">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th> العنوان</th>
                        <th>الصورة</th>
                        <th> الوصف المختصر</th>
                        <th class="text-center">الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article )
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{ $article->title ?? "" }}</td>
                        <td>
                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/article/'.$article->image)}}" width="60" height="60" alt=" صورة الخبر">
                        </td>
                        <td>{{$article->short_description ?? ""}}</td>

                        <td class="text-center">
                            <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                <a href="{{route('articles.show',$article->id)}}" type="button"
                                    class="btn btn-success mb-md-3 " title="Show">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="{{ route('articles.edit' , $article->id) }}" type="button"
                                    @if($article->deleted_at !== null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3   ">
                                <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('restore-articles' , $article->id) }}" type="button"
                                    @if($article->deleted_at == null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3 ">
                                    &#x21BA;
                                </a>
                                <a href="#" type="button" onclick="performDestroy({{ $article->id }} , this)" class="btn btn-danger mb-md-3">
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
            {{ $articles->links()}}
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
        let url = '/cms/admin/articles/'+id;
        confirmDestroy(url , referance );
    }
    </script>
@endsection
