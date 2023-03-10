<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>الاصيل | تسجيل الدخول</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
  <!-- Favicons -->
  <link rel="shortcut icon" href="{{ asset('front/assets/images/logo/2.jpg') }}" type="image/x-icon">

  <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body class="hold-transition login-page bg-light ">


<div class="login-boxr row align-items-center"  style="height: 100vh !important; width: 360px ; margin: auto">
    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
        <div class="login-logo ">
            <a href="cms/index2.html"><b style="font-size: 25px">الاصيل للصرافة</b></a>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="cms/index3.html" method="post">
        <div class="card-body">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" id="email" name="email" class="form-control" placeholder="ادخل الايميل ">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text"><span class="fas fa-lock"></span></span>
                </div>
                <input type="password" id="password" name="password"  class="form-control" placeholder="ادخل كلمة المرور">
            </div>
            <div class="row align-items-center">
                <div class="col-6 reset">
                    <a href="">اعادة كلمة المرور</a>
                </div>
                <div class="col-6">
                    <div class="icheck-primary text-right">
                        <label for="remember" style="font-size: 14px ; font-weight: 400" >
                            تذكرني لاحقا
                        </label>
                        <input type="checkbox" id="remember">
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12  pt-3">
                    <button type="button" onclick="login()" class="btn btn-success btn-block">دخول</button>
                </div>
                <!-- /.col -->
                </div>

        </div>

        </form>
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="{{asset('cms/js/crud.js')}}"></script>


<script>

function login() {
    var guard = '{{request('guard')}}';
    axios.post('/cms/'+guard+'/login', {
      email: document.getElementById('email').value,
      password: document.getElementById('password').value,
      guard: guard
    })
        .then(function (response) {
        window.location.href = '/cms/admin'
    })
        .catch(function (error) {
            if (error.response.data.errors !== undefined) {
              showErrorMessages(error.response.data.errors);

            } else {
                showMessage(error.response.data);
            }
        });
  }

  </script>
</body>
</html>
