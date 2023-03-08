
@extends('cms.parent')

@section('title' , ' الفرع')

@section('main-title' , 'قائمة الفروع')

@section('sub-title' , 'قائمة الفروع')

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
                                        <a href="{{route('branches.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                                    </div>
                                    <div class="input-icon col-md-4">
                                        <input type="text" class="form-control" placeholder="البحث باستخدام العنوان "
                                            name='address' @if( request()->address) value={{request()->address}} @endif/>
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                    </div>
                                    <div class="input-icon col-md-4">
                                        <input type="text" class="form-control" placeholder="البحث باستخدام الايميل "
                                            name='email' @if( request()->email) value={{request()->email}} @endif/>
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class=" col-md-12 ">
                                        <a href="{{route('branches.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة فرع جديد <i class="fas fa-plus nav-icon"></i></button></a>

                                        <a  href="{{ route('restoreindex-branches') }}" type="submit" class="btn btn-secondary ms-3 float-right ">سلة المحذوفات <i class="fas  fa-trash-alt"></i></a>
                                        <a  href="{{ route('branches.index') }}" type="submit" class="btn btn-success ml-3 float-right">قائمة الفروع <i class="fa-solid fa-code-branch"></i>
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
                                <th>  العنوان</th>
                                <th> الهاتف</th>
                                <th>  اسم المدينة </th>
                                <th> الاعدادات </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($branches as $branch)
                                    <tr>
                                        <td>{{ $branch->id ?? ""}}</td>
                                        <td>{{ $branch->address ?? "" }}</td>
                                        <td>{{ $branch->phone ?? "" }}</td>
                                        <td><span class="badge bg-info"> {{ $branch->city->name ?? "" }}</span></td>
                                        <td class="text-center">
                                            <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                                <a href="{{route('branches.show',$branch->id)}}" type="button"
                                                    class="btn btn-success mb-md-3 " title="Show">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('branches.edit' , $branch->id) }}" type="button"
                                                    @if($branch->deleted_at !== null)
                                                    hidden
                                                    @endif
                                                    class="btn btn-info mb-md-3   ">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('restore-branches' , $branch->id) }}" type="button"
                                                    @if($branch->deleted_at == null)
                                                    hidden
                                                    @endif
                                                    class="btn btn-info mb-md-3 ">
                                                    &#x21BA;
                                                </a>
                                                <a href="#" type="button" onclick="performDestroy({{ $branch->id }} , this)" class="btn btn-danger mb-md-3">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $branches->links() }}
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
        confirmDestroy('/cms/admin/branches/' + id , referance)
    }
</script>

@endsection
