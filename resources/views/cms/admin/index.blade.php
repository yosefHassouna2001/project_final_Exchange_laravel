@extends('cms.parent')

@section('title' , ' Admin')

@section('main-title' , 'Index Admin')

@section('sub-title' , 'index Admin')

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
                <form action="" method="get" style="margin-bottom: 2%;">
                    <div class="row">
                      <div class="input-icon col-md-4 ">
                        <input type="text" class="form-control" placeholder="Search By email"
                        name="email" @if(request()->email) value{{ request()->email }}

                        @endif/>
                        <span>
                          <i class="flaticon2-search-1 text-muted"></i>
                        </span>
                      </div>


                      <div class=" col-md-8">
                          <a href="{{ route('admins.index') }}" class="btn btn-danger btn-md ml-3  float-right"> End Filter</a>
                        <button class="btn btn-success btn-md ml-3  float-right" type="submit"> Filter</button>

                     </div>
                    </div>
                     <div class="row mt-3">
                      <div class=" col-md-12 ">

                        <a href="{{ route('admins.create') }}" type="submit" class="btn btn-info">Add New Admin</a>
                        <a  href="{{ route('restoreindex') }}" type="submit" class="btn btn-secondary ml-3 float-right ">Restore Admin <i class="fas  fa-trash-alt"></i></a>
                        <a  href="{{ route('admins.index') }}" type="submit" class="btn btn-success ml-3 float-right">All Admin</a>
                      </div>
                     </div>
                  </form>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Status</th>
                      <th>Gender</th>
                      <th>City</th>
                      <th>Seeting</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin )
                    {{-- <td><span class="tag tag-success">Approved</span></td> --}}

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
                        <td >
                            <div class="flex-nowrap d-flex " style="gap: 5px">
                                <a href="{{ route('admins.edit' , $admin->id) }}" type="button"
                                    @if($admin->deleted_at !== null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3   ">
                                <i class="fas fa-edit"></i>
                                </a>
                                <a type="button" onclick="performDestroy({{ $admin->id }} , this)" class="btn btn-danger mb-md-3">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href="{{ route('restore' , $admin->id) }}" type="button"
                                    @if($admin->deleted_at == null)
                                    hidden
                                    @endif
                                    class="btn btn-info mb-md-3 ">
                                    &#x21BA;
                                </a>
                            </div>
                        </td>

                        <td></td>
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
