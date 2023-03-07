@extends('cms.parent')

@section('title' , 'slider')

@section('main-title' , 'Create sliders')

@section('sub-title' , 'create sliders')

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
              <h3 class="card-title">Create Data of Slider</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>

              <div class="card-body">
              <div class="row">

                <div class="form-group col-md-6">
                  <label for="title">title of slider</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter titel of outhers">
                </div>

                <div class="form-group col-md-6">
                  <label for="descreption">descreption of slider</label>
                  <input type="text" class="form-control" id="descreption" name="descreption" placeholder="Enter descreption of outhers">
                </div>
                <div class="form-group col-md-12">
                    <label for="image">image of slider</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter image of outhers">
                  </div>
                   </div>
              </div>









              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
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

      let formData = new FormData();
      formData.append('title',document.getElementById('title').value);
      formData.append('descreption',document.getElementById('descreption').value);
      formData.append('image',document.getElementById('image').files[0]);


      store('/cms/admin/sliders' , formData);
    }

  </script>
@endsection
