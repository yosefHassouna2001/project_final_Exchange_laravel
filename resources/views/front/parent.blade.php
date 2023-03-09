<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta content="" name="keywords">
        <meta name="author" content="">
        <meta name="csrf-token" content="iDLZ4CC5KNT9lDaHzNbog4O1PT3Jj7vW1fgXVfTi">

        <title>شركة الأصيل للصرافة | @yield('title')</title>

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('front/assets/images/logo/2.jpg') }}" type="image/x-icon">
        <!-- bootstrap CSS  -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
        <!-- bootstrp icon v1.9.1 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <!-- font asom v6.2 -->
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">
        <!-- animate__animated -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{ asset('front/assets/css/styleAll.css') }}">

        <link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}" />

        <link rel="stylesheet" href="{{ asset('front/assets/css/anmation.css') }}">

        @yield('styles')
</head>

<body>
    <!-- ======= loading ======= -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <!-- ======= header ======= -->
    <header id="header" class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <div class="logo navbar-brand  animate__animated animate__backInRight">
                                <a href="#">
                                    <img src="{{ asset('front/assets/images/logo/55.png') }}" class="img-fluid logoimg" alt="شركة الاصيل">
                                </a>
                            </div>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar animate__animated  navagation " id="navbarSupportedContent">

                                <ul id="nav" class="navbar-nav  ">
                                    <li><a class="nav-link " href="{{ route('front.home') }}">الرئيسية</a></li>
                                    <li><a class="nav-link " href="{{ route('front.about') }}"> من نحن</a></li>
                                    <li><a class="nav-link " href="{{ route('front.services') }}">خدماتنا </a></li>
                                    <li><a class="nav-link " href="{{ route('front.currencies') }}">اسعار العملات </a></li>
                                    <li><a class="nav-link " href="{{ route('front.archive') }}"> الارشيف </a></li>
                                    <li><a class="nav-link " href="{{ route('front.news') }}"> الاخبار </a></li>
                                    <li><a class="nav-link " href="{{ route('front.question') }}">الأسئلة الشائعة</a></li>
                                    <li><a class="nav-link ms-3" href="{{ route('front.contactUs') }}">تواصل معنا</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- ======= Footer ======= -->

    <footer id="footer">
        <div class="footer-top pb-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 mb-sm-5 wow">
                        <h3>شركة الأصيل للصرافة و الحوالات المالية </h3>
                    </div>
                    <div class="col-md-5 wow">
                        <div class="social-links mt-0">
                            <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" class="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                        <div class="links mt-4">
                            <a href="#">الأحكام والشروط</a> -
                            <a href="#">سياسة الخصوصية</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix ">
            <div class="copyright w-100 text-center">
                © 2022 <strong><span> شركة الأصيل</span></strong>. جميع الحقوق محفوظة
            </div>
        </div>
    </footer>

    <!-- End Footer -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Bootstrp v 5.2.1 script js "offline" -->
<script src="{{ asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- wow script  -->
    <script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
<!-- main script -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>

<!-- count script -->
    <script src="{{ asset('front/assets/js/count-up.min.js') }}"></script>


    <script src="https://tftwallet.com/web/vendor/purecounter/purecounter.js"></script>

    @yield('scripts')


    </body>
</html>
