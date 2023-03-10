@extends('cms.parent')

@section('title' , ' الصلاحيات')

@section('main-title' , 'قائمة الصلاحيات ')

@section('sub-title' , 'قائمة الصلاحيات ')

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
                                <div class=" col-md-8">
                                    <button class="btn btn-success btn-md" type="submit">فلتر البحث <i class="fa-solid fa-magnifying-glass"></i></button>
                                    <a href="{{route('permissions.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="text" class="form-control" placeholder="البحث باسم الصلاحية"
                                        name='name' @if( request()->name) value={{request()->name}} @endif/>
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                </div>



                        </div>
                        <div class="row mt-3">
                            <div class=" col-md-12 ">
                                <a href="{{route('permissions.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة صلاحية جديدة <i class="fas fa-plus nav-icon"></i></button></a>

                                <a  href="{{ route('permissions.index') }}" type="submit" class="btn btn-success  float-right">قائمة الصلاحيات <i class="fa-solid fa-tree-city ml-2"></i>
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
                        <th>المشرف</th>
                        <th>اسم الصلاحية</th>
                        <th class="text-center">الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission )

                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->guard_name }}</td>
                        <td>{{$permission->name}}</td>
                        <td class="text-center">
                            <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                <a href="{{ route('permissions.edit' , $permission->id) }}" type="button"
                                    class="btn btn-info mb-md-3   ">
                                <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" type="button" onclick="performDestroy({{ $permission->id }} , this)" class="btn btn-danger mb-md-3">
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
                {{ $permissions->links()}}

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
      let url = '/cms/admin/permissions/'+id;
      confirmDestroy(url , referance );
    }
</script>
@endsection
