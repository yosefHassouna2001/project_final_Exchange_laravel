
@extends('front.parent')

@section('title' , 'تسجيل الدخول')

@section('styles')

@endsection

@section('content')
    <!-- ======= main Section ======= -->
    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact mt-5">
            <div class="container mt-5">
                <div class="section-title wow" data-wow-delay=".0s">
                    <span>دخول</span>
                    <h2>دخول</h2>
                    <p class="wow" data-wow-delay=".1s" >دخول إلي حسابك</p>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch wow">
                        <form action="" method="post" role="form" class="php-email-form">
                            <input type="hidden" name="_token" value="HFb1KPT4A6TSdbBZe6HhKT6shCLIQaHlw0ThyYyc">                            <div class="form-group mt-3">
                            <div class="wow" data-wow-delay=".1s">
                                <label for="email">الإيميل</label>
                                <input type="email" name="email" class="form-control" required="">
                            </div>
                            <div class="form-group mt-3 wow" data-wow-delay=".2s">
                                <label for="password">كلمة المرور</label>
                                <input type="password" class="form-control" name="password" required="">
                            </div>
                            <div class="row px-2 justify-content-between wow" data-wow-delay=".3s">
                                <div class="form-check col-auto mt-3">
                                    <input type="checkbox" class="form-check-input me-2" id="accept_pp_tos" name="remember_me" value="1" style="width: 1.3em; height: 1.3em;">
                                    <label class="form-check-label" for="accept_pp_tos">تذكرني</label>
                                </div>
                                <div class="col-auto mt-3 text-end">
                                    <a href="">هل نسيت كلمة السر ؟</a>
                                </div>
                            </div>
                            <div class="text-center mt-4 wow" data-wow-delay=".4s">
                                <button type="submit">دخول</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->

@endsection

@section('scripts')

@endsection


