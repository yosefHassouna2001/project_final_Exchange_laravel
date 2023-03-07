@extends('cms.parent')

@section('title' , ' category')

@section('main-title' , 'Index category')

@section('sub-title' , 'index category')

@section('styles')

@endsection

@section('content')
{{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                {{-- <h3 class="card-title"> Index Data of category</h3> --}}
                <a href="{{ route('categories.create') }}" type="button" class="btn btn-info">Add New category</a>

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
                      <th>Category Name</th>
                      <th>Description</th>
                      {{-- <th>Status</th> --}}
                      <th>Change Status</th>

                      <th>Setting</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category )
                    {{-- <td><span class="tag tag-success">Approved</span></td> --}}

                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name }}</td>
                        <td>{{$category->description}}</td>
                        {{-- <td><span class="badge bg-success">({{$category->status ?? ""}})</td> --}}

                            {{-- @if($category->status == 0)
                            <td style="background-color: rgb(249, 104, 6); color:#fff"> In Active</td>
                            @else
                            <td style="background-color: rgb(1, 114, 1); color:#fff">Active</td>
                            @endif --}}

                            <td><input type="checkbox" data-id="{{ $category->id }}" name="status" class="js-switch" {{ $category->status == 1 ? 'checked' : '' }}></td>

                        {{-- <td><span class="badge bg-info">({{$category->cities_count}}) Cities</td> --}}

                        <td>
                            <div class="btn group">
                              <a href="{{route('categories.edit' , $category->id)}}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                                {{-- <i class="far fa-edit"></i> --}}
                              </a>
                              <a href="#" type="button" onclick="performDestroy({{ $category->id }} , this)" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
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
            {{ $categories->links()}}
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
      let url = '/cms/admin/categories/'+id;
      confirmDestroy(url , referance );
    }


    $(document).ready(function(){
    $('.js-switch').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let id = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('categories.status') }}',
            data: {'status': status, 'id': id},
            success: function (data) {
            //   Swal.fire(
            //   'تم تعديل الحالة بنجاح',
            // )
            location.reload();
            }
        });
    });
});
</script>




@endsection
