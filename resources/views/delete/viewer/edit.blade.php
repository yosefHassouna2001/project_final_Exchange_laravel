@extends('cms.parent')

@section('title' , 'Viewer')

@section('main_title' , 'Update Viewer')

@section('sub_title' , 'Update_Viewer')


@section('styles')

@endsection



@section('content')
<section class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Data Of Viewer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="first_name">Viewer First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ $viewers->user->first_name }}" placeholder="Enter Viewer First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Viewer Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ $viewers->user->last_name }}" placeholder="Enter Viewer Last Name">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email"  value="{{ $viewers->email}}" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" disabled  class="form-control" id="password" name="password"
                            placeholder="Enter Password">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile"
                        value="{{ $viewers->user->mobile }}" placeholder="Enter Viewer Mobile">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                        value="{{ $viewers->user->address }}"  placeholder="Enter Viewer Addess">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-select form-select-sm" style="width: 100%;">
                            <option selected>{{ $viewers->user->gender }}</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select form-select-sm" style="width: 100%;">
                            <option selected>{{ $viewers->user->status  }}</option>
                            <option value="active">Ative</option>
                            <option value="inactive">InAtive</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="DOB">Date Of Birth</label>
                        <input type="date" value="{{ $viewers->user->DOB }}" class="form-control" id="DOB" name="DOB" placeholder="">
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city_id">City</label>
                            <select class="form-control select2" id="city_id" name="city_id" style="width: 100%;">
                            {{-- <option selected> {{ $viewers->user->city->name }} </option> --}}
                            <option selected value="{{$viewers->user->city->id}}">{{ $viewers->user->city->name }}</option>

                        @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="">
                    </div>
                </div>


                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="button" onclick="performUpdate({{ $viewers->id }})" class="btn btn-primary">Update</button>
                    <a href="{{ route('viewers.index') }}" type="button" class="btn btn-info">Return Back</a>
                </div>
        </form>
        <!-- form end -->
    </div>
</section>
@endsection


@section('scripts')
<script>
    function performUpdate(id){
    let formData = new FormData();
    formData.append('first_name',document.getElementById('first_name').value);
    formData.append('last_name',document.getElementById('last_name').value);
    formData.append('email',document.getElementById('email').value);
    // formData.append('password',document.getElementById('password').value);
    formData.append('mobile',document.getElementById('mobile').value);
    formData.append('address',document.getElementById('address').value);
    formData.append('gender',document.getElementById('gender').value);
    formData.append('status',document.getElementById('status').value);
    formData.append('DOB',document.getElementById('DOB').value);
    formData.append('city_id',document.getElementById('city_id').value);
    formData.append('image',document.getElementById('image').files[0]);
    storeRoute('/cms/admin/update-viewers/'+id , formData)
  }

</script>
@endsection
