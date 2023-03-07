@extends('cms.parent')

@section('title' , ' الدولة')

@section('main-title' , 'قائمة الدول')

@section('sub-title' , 'قائمة الدول')

@section('styles')

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">

                    <div class="card-header bg-transparent border-0">
                        <form action="" method="get" >
                            <div class="row">
                                <div class=" col-md-4">
                                    <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                                    <a href="{{route('countries.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="text" class="form-control" placeholder="البحث باسم الدولة"
                                        name='name' @if( request()->name) value={{request()->name}} @endif/>
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                </div>
                                <div class="input-icon col-md-4">
                                    <input type="number" class="form-control" placeholder="البحث برقم الكود"
                                        name='code' @if( request()->code) value={{request()->code}} @endif/>
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>



                            </div>
                            <div class="row mt-3">
                                <div class=" col-md-12 ">
                                    <a href="{{route('countries.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة دولة جديدة </button></a>

                                    {{-- <a href="{{ route('admins.create') }}" type="submit" class="btn btn-info">Add New Admin</a> --}}
                                    <a  href="{{ route('restoreindex') }}" type="submit" class="btn btn-secondary ms-3 float-right ">سلة المحذوفات <i class="fas  fa-trash-alt"></i></a>
                                    <a  href="{{ route('admins.index') }}" type="submit" class="btn btn-success ml-3 float-right">قائمة الدول                     <i class="fa-solid fa-tree-city ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    {{-- <table class="table table-hover text-nowrap"> --}}
                        <table class="table table-hover table-bordered table-striped text-nowrap text-center">

                    <thead>
                        <tr>
                        <th>رقم الدولة</th>
                        <th>اسم الدولة</th>
                        <th>الكود</th>
                        <th>عدد المدن</th>
                        <th class="text-center">الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($countries as $country )
                    <tr>
                        <td>{{$country->id}}</td>
                        <td>{{ $country->name }}</td>
                        <td>{{$country->code}}</td>
                        <td><span class="badge bg-info p-1">({{$country->cities_count}}) مدن</td>

                        <td class="text-center">
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
