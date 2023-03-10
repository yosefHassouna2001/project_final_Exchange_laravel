<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> لوحة التحكم | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free-6.1.1/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/custom.css') }}">
  @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        {{-- <a href="{{ route('home') }}" class="nav-link">الرئيسية</a> --}}
        <a href="#" class="nav-link">الرئيسية</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">تواصل</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="بحث" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('cms/dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('cms/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">الأدمن</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          {{--  <img src="{{ asset('storage/images/admin/' . auth('admin')->user()->images) }}" class="img-circle elevation-2"  --}}
           <img class="brand-image img-circle elevation-3" style="height: 100%;" src="{{ asset('storage/images/admin/' . auth('admin')->user()->images) }}"
            alt="User Image">
        </div>
        <div class="info">
           {{-- <a href="#" class="d-block"> {{ auth('admin')->user()->full_name }}</a> --}}
            {{-- @if (Auth::guard('admin')->id())
            @if (auth('admin')->user()->images !='')
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/admin/' . auth('admin')->user()->images) }}"alt="User Image">
            @else
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}"alt="User Image">

            @endif --}}

            {{-- @else
            <img class="brand-image img-circle elevation-3" src="{{ asset('images/userSolid.png') }}"alt="User Image">

            @endif --}}
          {{-- <img src="{{ asset('cms/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" --}}

        </div>
         <div class="info">
            @if (Auth::guard('admin')->id())
            <a href="#" class="d-block"> {{ auth('admin')->user()->full_name }}</a>
            @else
            <a href="#" class="d-block"> users</a>
            @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ route('home') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    الرئيسية | @yield('sub-title')
                    </p>
                </a>
            </li>
            <li class="nav-header">
                الأدوار والصلاحيات
            </li>
            @canany(['عرض الادوار', 'اضافة ادوار'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-users ml-2"></i>
                <p>
                    الأدوار
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('عرض الادوار')
                    <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                    {{-- <a href="#" class="nav-link"> --}}
                        <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض الأدوار</p>
                    </a>
                    </li>
                    @endcan
                    @can('اضافة ادوار')
                    <li class="nav-item">
                    <a href="{{route('roles.create') }}" class="nav-link">
                    {{-- <a href="#" class="nav-link"> --}}
                        <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة دور جديد</p>
                    </a>
                    </li>
                    @endcan


                </ul>
            </li>
            @endcanany

            @canany(['عرض الصلاحيات', 'اضافة الصلاحيات'])

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-users ml-2"></i>
                <p>
                    الصلاحيات
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('عرض الصلاحيات')

                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link">
                        {{-- <a href="#" class="nav-link"> --}}
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض الصلاحيات</p>
                        </a>
                    </li>
                    @endcan

                    @can('اضافة الصلاحيات')
                    <li class="nav-item">
                        <a href="{{route('permissions.create') }}" class="nav-link">
                        {{-- <a href="#" class="nav-link"> --}}
                            <i class="fas fa-plus mx-2 ml-4"></i>
                            <p>إضافة صلاحية جديدة</p>
                        </a>
                    </li>
                    @endcan

                </ul>
            </li>
            @endcanany

            <li class="nav-header">
                مستخدمين النظام
            </li>

            @canAny(['عرض المشرفين','اضافة مشرف'])

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    {{-- <i class="fas fa-user ml-2"></i> --}}
                    <i class="fa-solid fa-user-gear ml-2"></i>

                <p>
                    الادمن
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">

                @can('عرض المشرفين')
                    <li class="nav-item">
                        <a href="{{ route('admins.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض  </p>
                        </a>
                    </li>
                @endcan

                @can('اضافة المشرفين')
                    <li class="nav-item">
                        <a href="{{route('admins.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة ادمن جديد</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endCanAny


            <li class="nav-header">
            إدارة محتوى النظام
            </li>
            @canAny(['عرض الدول' , 'اضافة الدول'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-tree-city ml-2"></i>
                <p>
                    الدول
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('عرض الدول')
                    <li class="nav-item">
                        <a href="{{ route('countries.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض الدول</p>
                        </a>
                    </li>
                @endcan
                @can('اضافة الدول')
                    <li class="nav-item">
                        <a href="{{ route('countries.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة دولة جديدة</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endcanany

            @canAny(['عرض المدن' , 'اضافة مدينة'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-tree-city ml-2"></i>
                <p>
                    المدن
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('عرض المدن')
                    <li class="nav-item">
                        <a href="{{ route('cities.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض المدن</p>
                        </a>
                    </li>
                @endcan
                @can('اضافة مدينة')
                    <li class="nav-item">
                        <a href="{{ route('cities.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة مدينة جديدة</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endcanany

            @canAny(['عرض الفروع' , 'اضافة الفروع'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-code-branch ml-2"></i>
                <p>
                    الفروع
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('عرض الفروع')
                    <li class="nav-item">
                        <a href="{{ route('branches.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض الفروع</p>
                        </a>
                    </li>
                @endcan
                @can('اضافة الفروع')
                    <li class="nav-item">
                        <a href="{{ route('branches.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة فرع جديدة</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endcanany

            @canAny(['عرض الاخبار' , 'اضافة الاخبار'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-newspaper ml-2"></i>
                <p>
                    الاخبار
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('عرض الاخبار')
                    <li class="nav-item">
                        <a href="{{ route('articles.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض الاخبار</p>
                        </a>
                    </li>
                @endcan
                @can('اضافة الاخبار')
                    <li class="nav-item">
                        <a href="{{ route('articles.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة خبر جديدة</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endcanany

            @canAny(['عرض العملات' , 'اضافة العملات'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa-sharp fa-solid fa-coins ml-2"></i>
                <p>
                    العملات
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('عرض العملات')
                    <li class="nav-item">
                        <a href="{{ route('currencies.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض العملات</p>
                        </a>
                    </li>
                @endcan
                @can('اضافة العملات')
                    <li class="nav-item">
                        <a href="{{ route('currencies.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة عملة جديدة</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endcanany

            @canAny(['عرض الاسعار' , 'اضافة الاسعار'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-money-check-dollar ml-2"></i>
                <p>
                    الاسعار
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('عرض الاسعار')
                    <li class="nav-item">
                        <a href="{{ route('prices.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض الاسعار</p>
                        </a>
                    </li>
                @endcan
                @can('اضافة الاسعار')
                    <li class="nav-item">
                        <a href="{{ route('prices.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة سعر جديد</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endcanany

            @canAny(['عرض الاسئلة' , 'اضافة الاسئلة'])
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-clipboard-question ml-2"></i>
                <p>
                    الاسئلة الشائعة
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                @can('عرض الاسئلة')
                    <li class="nav-item">
                        <a href="{{ route('questions.index') }}" class="nav-link">
                            <i class="fas fa-desktop mx-2 ml-4"></i>
                        <p>  عرض الاسئلة</p>
                        </a>
                    </li>
                @endcan
                @can('اضافة الاسئلة')
                    <li class="nav-item">
                        <a href="{{ route('questions.create') }}" class="nav-link">
                            <i class="fas fa-plus mx-2 ml-4"></i>
                        <p>إضافة سؤال جديد</p>
                        </a>
                    </li>
                @endcan

                </ul>
            </li>
            @endcanany

            <li class="nav-header">
                الإعدادات
            </li>

                <li class="nav-item">

                <a href="{{ route('edit-profile-admin') }}" class="nav-link">
                        <i class="fas fa-user-cog ml-2"></i>
                        <p>   تعديل الصفحة الشخصية</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('change_password') }}" class="nav-link">

                        <i class="fas fa-lock ml-2"></i>
                        <p> تغيير كلمة المرور  </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt ml-2"></i>
                        <p>   تسجيل الخروج  </p>
                    </a>
                </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark"> @yield("main-title")</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">

                            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                            <li class="breadcrumb-item active"> @yield('sub-title')</li>

                            <!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                @yield('content')

</div>
</div>


   <div>
   <footer class="main-footer ">
    <strong>    جميع الحقوق محفوظة  {{ now()->year }}-{{ now()->year+1 }} &copy;<a href="#">{{ env('app_name') }}</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ env('APP_VERSION') }}
    </div>
   </footer>
   </div>
   {{-- @endif --}}

  <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
   </aside>
  <!-- /.control-sidebar -->

 <!-- ./wrapper -->

</div>
<!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="{{ asset('cms/https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('cms/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('cms/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('cms/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('cms/dist/js/demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('cms/js/crud.js')}}"></script>
@yield('scripts')
</body>
</html>
