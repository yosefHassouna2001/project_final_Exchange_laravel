@extends('cms.parent')

@section('title' , 'Admin')

@section('main-title' , 'Create Admin')

@section('sub-title' , 'create Admin')

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
              <h3 class="card-title">Create Data of Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">

                {{-- <div class="row">
                  <div class="form-group col-md-6">
                    <label>Roles</label>
                    <select class="form-control select2" id="role_id" name="role_id" style="width: 100%;">
                    @foreach($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                    </select>
                  </div>
                </div> --}}

              <div class="row">

                <div class="form-group col-md-6">
                  <label for="first_name">First Name of Admin</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name of Admin">
                </div>

                <div class="form-group col-md-6">
                  <label for="last_name">Last Name of Admin</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name of Admin">
                </div>
              </div>

                 <div class="row">

                <div class="form-group col-md-6">
                  <label for="email">Email of Admin</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email of Admin">
                </div>

                <div class="form-group col-md-6">
                  <label for="password"> password of Admin</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password of Admin">
                </div>
              </div>

            <div class="row">

                <div class="form-group col-md-6">
                  <label for="mobile">Mobile of Admin</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile of Admin">
                </div>

                <div class="form-group col-md-6">
                  <label for="address">address of Admin</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter address of Admin">
                </div>
              </div>
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="gender"
                    aria-label=".form-select-sm example">
                        <option value="">Choose gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status"
                    aria-label=".form-select-sm example">
                        <option value="">All</option>
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                    </select>
                </div>
          </div>
              <div class="row">
                    <div class="form-group col-md-6">
                      <label>City</label>
                      <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                        {{-- <option selected="selected">Alabama</option> --}}
                      @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                      @endforeach
                      </select>
                    </div>

                  <div class="form-group col-md-6">
                  <label for="date">Date of Birth </label>
                  <input type="date" class="form-control" id="date" name="date" placeholder="Enter Date of Admin">
                </div>

              </div>

                 <div class="row">

                  <div class="form-group col-md-12">
                  <label for="image">Image of Admin</label>
                  <input type="file" class="form-control" id="image" name="image" placeholder="Enter Date of Admin">
                </div>
                 </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('admins.index') }}" type="button" class="btn btn-info">Return Back</a>

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
      formData.append('first_name',document.getElementById('first_name').value);
      formData.append('last_name',document.getElementById('last_name').value);
      formData.append('status',document.getElementById('status').value);
      formData.append('gender',document.getElementById('gender').value);
      formData.append('date',document.getElementById('date').value);
      formData.append('city_id',document.getElementById('city_id').value);
      formData.append('address',document.getElementById('address').value);
      formData.append('email',document.getElementById('email').value);
      formData.append('password',document.getElementById('password').value);
      formData.append('mobile',document.getElementById('mobile').value);
      formData.append('image',document.getElementById('image').files[0]);
      // formData.append('role_id',document.getElementById('role_id').value);

      store('/cms/admin/admins' , formData);
    }

  </script>
@endsection
