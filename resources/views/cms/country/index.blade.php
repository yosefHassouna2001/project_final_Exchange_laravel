@extends('cms.parent')

@section('title' , ' Country')

@section('main-title' , 'Index Country')

@section('sub-title' , 'index country')

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
                {{-- <h3 class="card-title"> Index Data of Country</h3> --}}
                {{-- <a href="{{ route('countries.create') }}" type="button" class="btn btn-info">Add New Country</a> --}}
                <form action="" method="get" style="margin-bottom:2%;">
                  <div class="row">
                      <div class="input-icon col-md-2">
                          <input type="text" class="form-control" placeholder="Search By Name"
                             name='name' @if( request()->name) value={{request()->name}} @endif/>
                            <span>
                                <i class="flaticon2-search-1 text-muted"></i>
                            </span>
                          </div>
  
                          <div class="input-icon col-md-2">
                              <input type="number" class="form-control" placeholder="Search By Code"
                                 name='code' @if( request()->code) value={{request()->code}} @endif/>
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                              </div>


                  <div class="col-md-4">
                        <button class="btn btn-success btn-md" type="submit"> filter</button>
                        <a href="{{route('countries.index')}}"  class="btn btn-danger"> end filter</a>
                        {{-- @can('Create-City') --}}
                            
                        <a href="{{route('countries.create')}}"><button type="button" class="btn btn-md btn-primary"> Add new Country </button></a>
                        {{-- @endcan --}}
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
                      <th>Country Name</th>
                      <th>Code</th>
                      <th>Number of City</th>
                      <th>Seeting</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($countries as $country )
                    {{-- <td><span class="tag tag-success">Approved</span></td> --}}

                    <tr>
                        <td>{{$country->id}}</td>
                        <td>{{ $country->name }}</td>
                        <td>{{$country->code}}</td>
                        <td><span class="badge bg-info">({{$country->cities_count}}) Cities</td>

                        <td>
                            <div class="btn group">
                              <a href="{{route('countries.edit' , $country->id)}}" type="button" class="btn btn-info">
                                <i class="fas fa-edit"></i>
                                {{-- <i class="far fa-edit"></i> --}}
                              </a>
                              <a href="#" type="button" onclick="performDestroy({{ $country->id }} , this)" class="btn btn-danger">
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
            {{ $countries->links()}}
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
      let url = '/cms/admin/countries/'+id;
      confirmDestroy(url , referance );
    }  
</script>
@endsection