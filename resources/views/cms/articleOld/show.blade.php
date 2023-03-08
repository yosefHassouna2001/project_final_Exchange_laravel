@extends('cms.parent')

@section('title' , 'Article')

@section('main-title' , 'Edit Article')

@section('sub-title' , 'Edit Article')

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
              <h3 class="card-title">Edit Data of Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Category</label>
                    <select class="form-control select2" disabled id="category_id" name="category_id" style="width: 100%;">
                      {{-- <option selected="selected">Alabama</option> --}}
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Author</label>
                    <select class="form-control select2" disabled id="author_id" name="author_id" style="width: 100%;">
                      {{-- <option selected="selected">Alabama</option> --}}
                    @foreach($authors as $author)
                      <option value="{{ $author->id }}">{{ $author->user->first_name . ' ' .  $author->user->last_name }}</option>
                    @endforeach
                    </select>
                  </div>

                </div>

                <div class="row">

                <div class="form-group col-md-6">
                  <label for="title">Article Name</label>
                  <input type="text" class="form-control" disabled id="title" name="title"
                  value="{{ $articles->title }}" placeholder="Enter Name of Contry">
                </div>
                <div class="form-group col-md-6">
                  <label for="short_description">Short Description Article</label>
                  <input type="text" class="form-control" disabled id="short_description" name="short_description"
                  value="{{ $articles->short_description }}"  placeholder="Enter short_description of Article">
                </div>
 
              </div>

              <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                    <label for="full_description"> Description of Article</label>
                        <textarea class="form-control" disabled style="resize: none;" id="full_description" name="description" rows="4"
                        placeholder="Enter Full Description of Article " cols="50">{{ $articles->full_description }}</textarea>
                </div>
            </div>
          </div>
          <div class="row">

          <div class="form-group col-md-6">
            <label for="image">Edit Image</label>
            <input type="file" class="form-control" disabled id="image" name="image" placeholder="Enter Image">
          </div>
        </div>

              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <button type="button" onclick="performUpdate({{ $articles->id }})" class="btn btn-primary">Update</button> --}}
                <a href="{{ route('articles.index') }}" type="button" class="btn btn-info">Return Back</a>

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
      formData.append('title',document.getElementById('title').value);
      formData.append('short_description',document.getElementById('short_description').value);
      formData.append('full_description',document.getElementById('full_description').value);
      formData.append('category_id',document.getElementById('category_id').value);
      formData.append('author_id',document.getElementById('author_id').value);

      formData.append('image',document.getElementById('image').files[0]);

      storeRoute('/cms/admin/update-articles/'+id , formData);
    }

  </script>
@endsection