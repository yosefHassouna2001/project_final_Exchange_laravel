@extends('cms.parent')

@section('title' , 'Roles')

@section('main-title' , 'Edit Roles')

@section('sub-title' , 'Edit Roles')

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
              <h3 class="card-title">Edit Data of Roles</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

                
          <div class="form-group col-md-6">
            <label for="guard_name">Gender</label>
            <select class="form-select form-select-sm" name="guard_name" style="width: 100%;"
                  id="guard_name" aria-label=".form-select-sm example">
                  <option value="admin" @if($roles->guard_name == 'admin') selected @endif>Admin</option>
                  <option value="author" @if($roles->guard_name == 'author') selected @endif>Author</option>
                </select>
            </div>
                <div class="form-group">
                  <label for="name">Roles Name</label>
                  <input type="text" class="form-control" id="name" name="name"
                   value="{{ $roles->name }}" placeholder="Enter Name of Contry">
                </div>
           
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{ $roles->id }})" class="btn btn-primary">Store</button>
                <a href="{{ route('roles.index') }}" type="button" class="btn btn-info">Return Back</a>

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
  <script>
    function performUpdate(id){

      let formData = new FormData();
      formData.append('name',document.getElementById('name').value);
      formData.append('guard_name',document.getElementById('guard_name').value);

      storeRoute('/cms/admin/roles-update/'+id , formData);
    }

  </script>
@endsection
