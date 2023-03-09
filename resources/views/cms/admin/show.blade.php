@extends('cms.parent')

@section('title',' مدير النظام')


@section('main-title','معلومات المشرف ')

@section('sub-title','معلومات المشرف ')

@section('styles')

@endsection

@section('content')
<!-- Main content -->
<style>
  .show li>a{
        font-weight:500;
        /* border-radius: 7px;
        padding:0 5px;
        background: rgb(12, 12, 12); */
    }
</style>
<section class="content ">
    <div class="container mt-5">
        <div class="row show ">
            <div class="card card-primary card-outline col-12">
                <div class="card-body box-profile ">
                    <div class="text-center ">
                        <img class="img-circle img-bordered-sm rounded-3 " src="{{asset('storage/images/admin/'.$admins->user->image ?? "")}}" width="100" height="100" alt="User Image">

                        {{-- <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/images/admin/'.$admins->user->image ?? "" )}}" alt="User profile picture"> --}}
                    </div>

                    <h3 class="profile-username text-center">{{ $admins->user ?$admins->user->first_name.'  '.$admins->user->last_name : null }}</h3>


                    <p class="text-muted text-center">{{ $admins->email}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>  رقم الجوال :</b> <a class="text-danger">{{ $admins->user ? $admins->user->mobile : ' '  }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>تاريخ الميلاد :</b> <a class=" text-danger">{{ $admins->user ? $admins->user->date : ' ' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>المدينة :</b> <a class="text-danger">{{$admins->user->city->name ?? ' ' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b> العنوان :</b> <a class="text-danger">{{ $admins->user ? $admins->user->address : ' ' }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>الجنس :</b> <a class="text-danger">{{ $admins->user ? $admins->user->gender : ' ' }}</a>
                        </li>

                    </ul>
                    {{-- @can('Index-Admin') --}}
                    <a href="{{route('admins.index')}}" class="btn btn-primary btn-block"><b>قائمة المشرفين</b></a>

                    {{-- @endcan --}}

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')


@endsection
