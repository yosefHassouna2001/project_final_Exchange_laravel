
@extends('front.parent')

@section('title' , 'توصل معنا')

@section('styles')

<link rel="stylesheet" href="{{ asset('front/assets/css/contact.css') }}">

@endsection

@section('content')
   <!-- ======= main Section ======= -->
    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact mt-5">
            <div class="container">

                <div class="section-title mt-5 wow" data-wow-delay=".0s">
                    <span>تواصل معنا</span>
                    <h2>تواصل معنا</h2>
                    <p class="wow" data-wow-delay=".1s">
                        يمكنك التواصل معنا في اي وقت من خلال هذه الصفحة
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-5 d-flex align-items-stretch wow"  data-wow-delay=".2s">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>الموقع:</h4>
                                <p>
                                    فلسطين (غزة)
                                </p>
                            </div>
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>إيميل:</h4>
                                <p>
                                    <a href="email:examble@gmail.com">
                                        examble@gmail.com
                                    </a>
                                </p>
                            </div>
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>الهاتف:</h4>
                                <p>
                                    <a href="tel:+456453">
                                        +456453
                                    </a>
                                </p>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d881.6488469701768!2d34.458020894498574!3d31.509034885953604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f588e7b63ab%3A0x44264cd005601fee!2z2LTYsdmD2Kkg2K3YrNin2LLZiiDZhNmE2K3YrNixINin2YTZgtiv2LPZig!5e0!3m2!1sar!2s!4v1667913027226!5m2!1sar!2s" style="border:0; width: 100%; height: 290px;" allowfullscreen="" frameborder="0" ></iframe>
                        </div>
                    </div>
                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch wow" data-wow-delay=".2s">
                        <form action="https://tftwallet.com/ar/contact" method="post" role="form" class="php-email-form">
                            <input type="hidden" name="_token" value="ZvaHbGTcT9Zx2kX6Sbp72mcjRrLhofPj5trkJYYC">                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">إسمك</label>
                                    <input type="text" name="name" class="form-control" id="name" required="">
                                </div>
                                <div class="form-group col-md-6 mt-3 mt-md-0">
                                    <label for="name">إيميلك</label>
                                    <input type="email" class="form-control" name="email" id="email" required="">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">الموضوع</label>
                                <input type="text" class="form-control" name="subject" id="subject" required="">
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">الرسالة</label>
                                <textarea class="form-control" name="message" rows="10" required=""></textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit">إرسال الرسالة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main>
    <!-- End #main -->
@endsection

@section('scripts')

@endsection



