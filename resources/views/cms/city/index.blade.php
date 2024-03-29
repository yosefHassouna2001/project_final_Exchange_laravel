
@extends('cms.parent')

@section('title' , ' المدينة')

@section('main-title' , 'قائمة المدن')

@section('sub-title' , 'قائمة المدن')

@section('styles')

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="card-header bg-transparent border-0">
                            <form action="" method="get" >
                                <div class="row">
                                    <div class=" col-md-4">
                                        <button class="btn btn-success btn-md" type="submit">فلتر البحث <i class="fa-solid fa-magnifying-glass"></i></button>
                                        <a href="{{route('cities.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                                    </div>
                                    <div class="input-icon col-md-4">
                                        <input type="text" class="form-control" placeholder="البحث باسم المدينة"
                                            name='name' @if( request()->name) value={{request()->name}} @endif/>
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                    </div>
                                    <div class="input-icon col-md-4">
                                        <input type="text" class="form-control" placeholder="البحث باسم الشارع"
                                            name='street' @if( request()->street) value={{request()->street}} @endif/>
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" col-md-12 ">
                                        <a href="{{route('cities.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة مدينة جديدة <i class="fas fa-plus nav-icon"></i></button></a>

                                        <a  href="{{ route('restoreindex-cities') }}" type="submit" class="btn btn-secondary ms-3 float-right ">سلة المحذوفات <i class="fas  fa-trash-alt"></i></a>
                                        <a  href="{{ route('cities.index') }}" type="submit" class="btn btn-success ml-3 float-right">قائمة المدن <i class="fa-solid fa-tree-city ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered table-striped text-nowrap text-center">

                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>  اسم المدينة </th>
                                <th> اسم الشارع </th>
                                <th>  اسم الدولة </th>
                                <th> الاعدادات </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->id ?? ""}}</td>
                                        <td>{{ $city->name ?? "" }}</td>
                                        <td>{{ $city->street ?? "" }}</td>
                                        <td><span class="badge bg-info"> {{ $city->country->name ?? "" }}</span></td>
                                        <td class="text-center">
                                            <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                                <a href="{{route('cities.show',$city->id)}}" type="button"
                                                    class="btn btn-success mb-md-3 " title="Show">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('cities.edit' , $city->id) }}" type="button"
                                                    @if($city->deleted_at !== null)
                                                    hidden
                                                    @endif
                                                    class="btn btn-info mb-md-3   ">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('restore-cities' , $city->id) }}" type="button"
                                                    @if($city->deleted_at == null)
                                                    hidden
                                                    @endif
                                                    class="btn btn-info mb-md-3 ">
                                                    &#x21BA;
                                                </a>
                                                <a href="#" type="button" onclick="performDestroy({{ $city->id }} , this)" class="btn btn-danger mb-md-3">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $cities->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('scripts')

<script>
    function performDestroy(id , referance){
        confirmDestroy('/cms/admin/cities/' + id , referance)
    }
</script>

@endsection
