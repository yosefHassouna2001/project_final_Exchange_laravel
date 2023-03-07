@extends('cms.parent')

@section('title' , 'Roles')

@section('main-title' , 'Create Roles')

@section('sub-title' , 'create Roles')

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
              <h3 class="card-title">Create Data of Roles</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

                
          <div class="form-group col-md-6">
            <label for="guard_name">Role Name</label>
            <select class="form-select form-select-sm" name="guard_name" style="width: 100%;"
                  id="guard_name" aria-label=".form-select-sm example">
                 <option value="admin">Admin </option>
                 <option value="author">Author </option>
              </select>
            </div>
                <div class="form-group col-md-6">
                  <label for="name">Roles Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of Role">
                </div>
           
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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
    function performStore(){

      let formData = new FormData();
      formData.append('name',document.getElementById('name').value);
      formData.append('guard_name',document.getElementById('guard_name').value);

      store('/cms/admin/roles' , formData);
    }

  </script>
@endsection
