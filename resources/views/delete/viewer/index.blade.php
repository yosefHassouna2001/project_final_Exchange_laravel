@extends('cms.parent')

@section('title' , 'Viewer')

@section('main_title' , 'Index Viewer')

@section('sub_title' , 'index_Viewer')


@section('styles')

@endsection




@section('content')
<section class="content">
    <div class="container-fluid px-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">Index Data Of Viewer</h3> --}}
                        <a href="{{ route('viewers.create') }}" type="button" class="btn btn-info">Add New Viewer</a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

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
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>City_Name</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($viewers as $viewer)
                                {{-- <td><span class="tag tag-success">Approved</span></td> --}}
                                <tr>
                                    <td>{{ $viewer->id }}</td>
                                    <td>
                                        <img class="img-circle img-bordered-sm"
                                             src="{{ asset('storage/images/viewer/'.$viewer->user->image) }}"
                                             width="60" height="60" alt="User_Image">
                                    </td>
                                    <td>{{ ($viewer->user->first_name . ' ' . $viewer->user->last_name ) ?? "" }}</td>
                                    <td>{{ $viewer->email  }}</td>
                                    <td>{{ $viewer->user->mobile ?? "" }}</td>
                                    <td>{{ $viewer->user->address ?? ""}}</td>
                                    <td>{{ $viewer->user->gender ?? ""}}</td>
                                    <td>{{ $viewer->user->status ?? "" }}</td>
                                    <td>{{ $viewer->user->city->name ?? "" }}</td>
                                    <td>
                                    <div class="btn group">
                                          <a href="{{ route('viewers.edit' , $viewer->id ) }}" type="button" class="btn btn-info">
                                            <i class="fas fa-edit"> </i>
                                         </a>
                                          <button type="button" class="btn btn-info" onclick="performDestroy({{ $viewer->id }} , this)">
                                            <i class="fas fa-trash"></i>
                                          </button>
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
                {{ $viewers->links() }}
            </div>
        </div>
    </div>
</section>
@endsection


@section('scripts')
<script>
  function performDestroy(id , reference){
    let url = "/cms/admin/viewers/"+id;
    confirmDestroy(url, reference);
  }


</script>
@endsection
