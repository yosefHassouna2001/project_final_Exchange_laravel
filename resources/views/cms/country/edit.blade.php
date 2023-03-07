@extends('cms.parent')

@section('title' , 'Country')

@section('main-title' , 'Edit Country')

@section('sub-title' , 'edit country')

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
              <h3 class="card-title">Edit Data of Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Country Name</label>
                  <input type="text" class="form-control" id="name" name="name"
                    value="{{ $countries->name }}" placeholder="Enter Name of Contry">
                </div>
                <div class="form-group">
                  <label for="code">Code</label>
                  <input type="text" class="form-control" id="code" name="code" 
                  value="{{$countries->code}}" placeholder="Enter Code of Country">
                </div>           
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate({{$countries->id}})" class="btn btn-primary">Update</button>
                <a href="{{route('countries.index')}}" type="button" class="btn btn-secondary">Cancel</a>

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
      formData.append('code',document.getElementById('code').value);

      storeRoute('/cms/admin/update-countries/' +id , formData);
    }

</script>
@endsection