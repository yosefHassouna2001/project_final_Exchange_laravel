@extends('cms.parent')

@section('title' , ' الادوار')

@section('main-title' , 'قائمة الادوار')

@section('sub-title' , 'قائمة الادوار')

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
                                    <a href="{{route('roles.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="text" class="form-control" placeholder="البحث باسم الدور"
                                        name='name' @if( request()->name) value={{request()->name}} @endif/>
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                </div>



                            </div>
                            <div class="row mt-3">
                                <div class=" col-md-12 ">
                                    <a href="{{route('roles.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة دور جديد <i class="fas fa-plus nav-icon"></i></button></a>

                                    <a  href="{{ route('roles.index') }}" type="submit" class="btn btn-success  float-right">قائمة الادوار <i class="fa-solid fa-tree-city ml-2"></i>
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
                            <th>اسم المشرف</th>
                            <th>اسم الدور</th>
                            <th>الصلاحيات</th>
                            <th class="text-center">الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role )
                        {{-- <td><span class="tag tag-success">Approved</span></td> --}}

                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->guard_name }}</td>
                            <td>{{$role->name}}</td>

                            <td><a href="{{route('roles.permissions.index', $role->id)}}"
                                class="btn btn-info">({{$role->permissions_count}})
                                صلاحيات</a>
                            </td>
                            <td class="text-center">
                                <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                    <a href="{{ route('roles.edit' , $role->id) }}" type="button"
                                        class="btn btn-info mb-md-3   ">
                                    <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" type="button" onclick="performDestroy({{ $role->id }} , this)" class="btn btn-danger mb-md-3">
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
                {{-- {{ $roles->links()}} --}}
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
        let url = '/cms/admin/roles/'+id;
        confirmDestroy(url , referance );
    }
</script>
@endsection
