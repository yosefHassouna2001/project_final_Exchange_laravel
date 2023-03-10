
@extends('cms.parent')

@section('title' , 'السعر')

@section('main-title' , 'قائمة الاسعار')

@section('sub-title' , 'قائمة الاسعار')

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
                                    <div class=" col-md-8">
                                        <button class="btn btn-success btn-md" type="submit">فلتر البحث <i class="fa-solid fa-magnifying-glass"></i></button>
                                        <a href="{{route('prices.index')}}"  class="btn btn-danger">إنهاء البحث</a>

                                    </div>
                                    <div class="input-icon col-md-4">
                                        <input type="text" class="form-control" placeholder="البحث باسم العملة"
                                            name='name' @if( request()->name) value={{request()->name}} @endif/>
                                            <span>
                                                <i class="flaticon2-search-1 text-muted"></i>
                                            </span>
                                    </div>

                                </div>
                                <div class="row mt-3">
                                    <div class=" col-md-12 ">
                                        <a href="{{route('prices.create')}}"><button type="button" class="btn btn-md btn-info"> إضافة سعر جديد <i class="fas fa-plus nav-icon"></i></button></a>

                                        <a  href="{{ route('restoreindex-prices') }}" type="submit" class="btn btn-secondary ms-3 float-right ">سلة المحذوفات <i class="fas  fa-trash-alt"></i></a>
                                        <a  href="{{ route('prices.index') }}" type="submit" class="btn btn-success ml-3 float-right">قائمة الاسعار <i class="fa-solid fa-tree-city ml-2"></i>
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

                            {{-- $table->string('buy_price');
                            $table->string('sale_price');//بيع
                            $table->foreignId('currency_id'); --}}
                                <th style="width: 10px">#</th>
                                <th>  اسم العملة </th>
                                <th> سعر البيع  </th>
                                <th>  سعر الشراء  </th>
                                <th> الاعدادات </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($prices as $price)
                                    <tr>
                                        <td>{{ $price->id ?? ""}}</td>
                                        <td><span class="badge bg-info"> {{ $price->currency->name ?? "" }}</span></td>
                                        <td>{{ $price->sale_price ?? "" }}</td>
                                        <td>{{ $price->buy_price ?? "" }}</td>
                                        <td class="text-center">
                                            <div class="flex-nowrap d-flexd text-center " style="gap: 5px">
                                                <a href="{{route('prices.show',$price->id)}}" type="button"
                                                    class="btn btn-success mb-md-3 " title="Show">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                <a href="{{ route('prices.edit' , $price->id) }}" type="button"
                                                    @if($price->deleted_at !== null)
                                                    hidden
                                                    @endif
                                                    class="btn btn-info mb-md-3   ">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('restore-prices' , $price->id) }}" type="button"
                                                    @if($price->deleted_at == null)
                                                    hidden
                                                    @endif
                                                    class="btn btn-info mb-md-3 ">
                                                    &#x21BA;
                                                </a>
                                                <a href="#" type="button" onclick="performDestroy({{ $price->id }} , this)" class="btn btn-danger mb-md-3">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $prices->links() }}
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
        confirmDestroy('/cms/admin/prices/' + id , referance)
    }
</script>

@endsection
