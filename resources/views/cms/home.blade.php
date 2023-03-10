@extends('cms.parent')
@section('title','Home Page')

@section('styles')
<style>
    a{
        color: black;
        font-weight: bold
    }

    a:hover{
        text-decoration: none;
    }
</style>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">


        <!-- col -->
        @php
        use App\Models\Admin;
        $count = Admin::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4 ">
            <div class="info-box mb-3">
              <a href="{{route('admins.index')}}" class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-user-gear ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('admins.index')}}" class="info-box-text">عدد المشرفين </a>
                <a href="{{route('admins.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          @php
          use App\Models\Country;
          $count = Country::count('id');
          @endphp

          <div class="col-12 col-sm-6 col-md-4 ">
            <div class="info-box mb-3">
              <a href="{{route('countries.index')}}" class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-tree-city ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('countries.index')}}" class="info-box-text">عدد الدول </a>
                <a href="{{route('countries.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          @php
          use App\Models\City;
          $count = City::count('id');
          @endphp

          <div class="col-12 col-sm-6 col-md-4  ">
            <div class="info-box mb-3">
              <a href="{{route('cities.index')}}" class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-tree-city ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('cities.index')}}" class="info-box-text">عدد المدن </a>
                <a href="{{route('cities.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          @php
          use App\Models\Branch;
          $count = Branch::count('id');
          @endphp

          <div class="col-12 col-sm-6  col-md-4 ">
            <div class="info-box mb-3">
              <a href="{{route('branches.index')}}" class="info-box-icon bg-success elevation-1"><i class="fa-solid fa-code-branch ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('branches.index')}}" class="info-box-text">عدد الفروع </a>
                <a href="{{route('branches.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          @php
          use App\Models\Article;
          $count = Article::count('id');
          @endphp

          <div class="col-12 col-sm-6 col-md-4 ">
            <div class="info-box mb-3">
              <a href="{{route('articles.index')}}" class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-newspaper ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('articles.index')}}" class="info-box-text">عدد الاخبار </a>
                <a href="{{route('articles.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          {{-- @php
          use App\Models\Country;
          $count = Country::count('id');
          @endphp --}}

          <div class="col-12 col-sm-6 col-md-4 ">
            <div class="info-box mb-3">
              <a href="{{route('admins.index')}}" class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-user-gear ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('admins.index')}}" class="info-box-text">عدد العملات </a>
                <a href="{{route('admins.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- col -->
          {{-- @php
        use App\Models\Author;
        $count = Author::count('id');
        @endphp --}}

          {{-- <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('authors.index')}}" class="info-box-icon bg-success elevation-1"><i class="fas fa-user ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('authors.index')}}" class="info-box-text">Number of Authors </a>
                <a href="{{route('authors.index')}}" class="info-box-number">{{$count}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> --}}
          <!-- /.col -->

          <!-- col -->
          {{-- @php
        use App\Models\Category;
        $serCount = Category::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('categories.index')}}" class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-chalkboard-user ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('categories.index')}}" class="info-box-text">عدد التصيفات</a>
                <a href="{{route('categories.index')}}" class="info-box-number">{{$serCount}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> --}}
          <!-- /.col -->

          <!-- col -->
          {{-- @php
        use App\Models\Article;
        $sparCount = Article::count('id');
        @endphp

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <a href="{{route('articles.index')}}" class="info-box-icon bg-blue elevation-1"><i class="fa-solid fa-user-graduate ml-2"></i></a>

              <div class="info-box-content">
                <a href="{{route('articles.index')}}" class="info-box-text">عدد ألأاخبار</a>
                <a href="{{route('articles.index')}}" class="info-box-number">{{$sparCount}}</a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col --> --}}




    </div>
</div>

@endsection

@section('scripts')

@endsection
