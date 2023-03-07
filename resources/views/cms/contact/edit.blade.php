

@extends('cms.parent')

@section('title' , 'sliders')

@section('main-title' , 'Edit sliders')

@section('sub-title' , 'edit sliders')

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
              <h3 class="card-title">Create Data of seeders</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="title">title of slider</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="titelt  of sliders">
                </div>

                <div class="form-group col-md-6">
                  <label for="descreption">descreption of slider</label>
                  <input type="text" class="form-control" id="descreption" name="descreption" placeholder="descreption of sliders">
                </div>
                <div class="form-group col-md-12">
                    <label for="image">address of slider</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter Date of sliders">
                  </div>
                   </div>
              </div>




              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performUpdate($sliders->id)" class="btn btn-primary">Store</button>
                <a href="{{ route('sliders.index') }}" type="button" class="btn btn-info">Return Back</a>

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

      let formData = new FormData(id);
      formData.append('title',document.getElementById('title').value);
      formData.append('descreption',document.getElementById('descreption').value);
      formData.append('image',document.getElementById('image').files[0]);

      storeRoute('/cms/admin/update-sliders/'+id , formData);
    }

  </script>
@endsection
