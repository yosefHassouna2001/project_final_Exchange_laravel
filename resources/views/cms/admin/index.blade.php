@extends('cms.parent')

@section('title' , ' المشرفين')

@section('main-title' , 'قائمة المشرفين')

@section('sub-title' , 'قائمة المشرفين')

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
                                <a href="{{route('admins.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                            </div>
                            <div class="input-icon col-md-4">
                                <input type="text" class="form-control" placeholder="البحث بالاسم"
                                name="first_name" @if(request()->first_name) value{{ request()->first_name }} @endif/>
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                            <div class="input-icon col-md-4">
                                <input type="text" class="form-control" placeholder="البحث باستخدام الايميل"
                                    name='email' @if( request()->email) value={{request()->email}} @endif/>
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class=" col-md-12 ">
                                <a href="{{route('admins.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة مشرف جديد <i class="fas fa-plus nav-icon"></i></button></a>

                                <a  href="{{ route('restoreindex-admins') }}" type="submit" class="btn btn-secondary ms-3 float-right ">سلة المحذوفات <i class="fas  fa-trash-alt"></i></a>
                                <a  href="{{ route('admins.index') }}" type="submit" class="btn btn-success ml-3 float-right">قائمة المشرفين <i class="fa-solid fa-user-gear ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>الاسم </th>
                        <th>الايميل</th>
                        <th>الهاتف</th>
                        <th>الحالة</th>
                        <th>الجنس</th>
                        <th>المدينة</th>
                        <th>الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin )
                        <tr>

                        <td>{{$admin->id}}</td>
                        <td>
                            <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->user->image ?? "")}}" width="60" height="60" alt="User Image">
                        </td>
                        <td>{{$admin->user->first_name .' '. $admin->user->last_name  }}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->user->mobile ?? ""}}</td>
                        <td>{{$admin->user->status ?? ""}}</td>
                        <td>{{$admin->user->gender ?? ""}}</td>
                        <td><span class="badge bg-info">({{$admin->user->city->name ?? ""}})</td>
                        <td class="text-center">
                            <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                <a href="{{route('admins.show',$admin->id)}}" type="button"
                                    class="btn btn-success mb-md-3 " title="Show">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                {{-- <a href="{{ route('admins.edit' , $admin->id) }}" type="button"
                                    @if($admin->deleted_at !== null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3   ">
                                <i class="fas fa-edit"></i>
                                </a> --}}
                                <a href="{{ route('restore-admins' , $admin->id) }}" type="button"
                                    @if($admin->deleted_at == null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3 ">
                                    &#x21BA;
                                </a>
                                <a href="#" type="button" onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-danger mb-md-3">
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
            {{ $admins->links()}}
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
      let url = '/cms/admin/admins/'+id;
      confirmDestroy(url , referance );
    }
</script>


@endsection
