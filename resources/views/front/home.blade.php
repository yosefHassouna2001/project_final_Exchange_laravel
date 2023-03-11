
@extends('front.parent')

@section('title' , 'الرئيسية')

@section('styles')

@endsection

@section('content')
    <!-- ======= Hero Section ======= -->

    <section class="hero-area">
        <img class="hero-shape" src="assets/images/hero/hero-shape.svg" alt="#">
        <div class="container pt-3">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12  ">
                    <div class="hero-content">
                        <div class="">
                            <h1 class="wow fadeInUp" data-wow-delay=".2s" >   شركة <span><img class="text-shape " src="assets/images/hero/text-shape.svg" alt="#"> الأصيل</span> للصرافة و الحوالات المالية  </h1>
                            <h4 class="wow fadeInUp" data-wow-delay=".4s"> قم بتحويل وحفظ اموالك . نقدم لكم الخدمة الافضل</h4>
                            <div class="button wow fadeInUp" data-wow-delay=".6s">
                                <!-- <a href="login.html" class="btn mb-3 fs-5">إبـدا الأن </a> -->
                            </div>
                        </div>
                        <div class="widget-body  ">
                            <table class="w-100 text-center table table-hover table-striped wow zoomIn"data-wow-delay=".8s" >
                                <tr class="fs-5">
                                    <th class="text-primary ">العملة </th>
                                    <th class="text-primary ">سعر الشراء</th>
                                    <th class="text-primary ">سعر البيع</th>
                                </tr>

                            @foreach($prices as $price)
                                <tr>
                                    <th class=" fs-5">
                                        <img src="{{asset('storage/images/currency/' . $price->currency->image)}}"
                                        class=" ms-3" alt=""><span>{{ $price->currency->name }}</span>
                                    </th>
                                    <td>{{ $price->buy_price }}</td>
                                    <td>{{ $price->sale_price }}</td>
                                </tr>
                            @endforeach

                                <tr class="fw-bold border-0 " >
                                    <td class="fs-5" style="white-space: nowrap;"><i class="fa-solid fa-arrows-rotate"></i> آخر تحديث : </td>
                                    <td colspan="2" style="white-space: nowrap;">
                                        {{-- <span class="date"> 2022-11-01 </span> الساعة <span class="time"> 11:53 </span> --}}
                                        <span class="date"> {{ $price->created_at }} </span>
                                            <a href="{{ route('front.archive') }}" class="btn btn-primary btn-sm mx-auto me-4 text-white">الأرشيف</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="hero-image">
                        <img class="main-image" src="assets/images/hero/home2-bg.png" alt="#">
                        <img class="h2-move-1" src="assets/images/hero/h2-bit-l.png" alt="#">
                        <img class="h2-move-2" src="assets/images/hero/3.png" alt="#">
                        <img class="h2-move-3" src="assets/images/hero/4png.png" alt="#">
                    </div>
                    <div class="all " dir="ltr">
                        <a href="{{ route('front.currencies') }}"class="btn btn-outline-primary  fs-5 p-3 text-white border-light m-5" >عرض جميع العملات   </a>


                    </div>
                </div>
                <div class="bubbles ">
                    <img src="assets/images/hero/bubble.png" alt="">
                    <img src="assets/images/hero/bubble.png" alt="">
                    <img src="assets/images/hero/bubble.png" alt="">
                    <img src="assets/images/hero/bubble.png" alt="">
                    <img src="assets/images/hero/bubble.png" alt="">
                </div>

    </section>

    <!-- ======= main Section ======= -->

    <main id="main">
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts fadeInUp rr " >
            <div class="container">
                <div class="row counters">
                    <div class="col-lg-4 col-6 text-center wow" data-wow-delay=".2s">
                        <span class="d-flex justify-content-center"> + <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="2" class="purecounter me-1">50</span></span>
                        <p>عام من الثقة</p>
                    </div>

                    <div class="col-lg-4 col-6 text-center wow" data-wow-delay=".3s">
                        <span class="d-flex justify-content-center"> + <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2" class="purecounter me-1">15 </span></span>
                        <p>فرعا في فلسطين</p>
                    </div>



                    <div class="col-lg-4 col-6 text-center wow  data-wow-delay=".4s">
                        <span class="d-flex justify-content-center"> + <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2" class="purecounter me-1">10</span></span>
                        <p>الخدمات  </p>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg  ">
            <div class="container">

                <div class="section-title wow">
                    <span>الخدمات</span>
                    <h2>الخدمات</h2>
                    <p>الخدمات التي نقدمها</p>
                </div>

                <div class="row no-gutters">
                    <div class="col-lg-4 col-md-6 align-items-stretch mt-4 zoomIn wow" data-wow-delay=".1s">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-wallet2"></i></div>
                            <h4><a>محفظة إلكترونية</a></h4>
                            <p>قم باضافة وحفظ أموالك عن طريق محفظتك الالكترونية</p>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6 align-items-stretch mt-4 zoomIn wow" data-wow-delay=".3s">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-download"></i></div>
                            <h4><a >الإيداع</a></h4>
                            <p>أضف أموال الي محفظتك من خلال طرق الايداع المختلفة</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch mt-4 zoomIn wow" data-wow-delay=".5s">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-upload"></i></div>
                            <h4><a>السحب</a></h4>
                            <p>قم بسحب رصيدك علي اي وسيلة بخطوات بسيطة</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch mt-4 zoomIn wow" data-wow-delay=".7s">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-arrow-up-right-square"></i></div>
                            <h4><a>إرسال الأموال</a></h4>
                            <p>ارسل الأموال الي المستخدمين الاخرين من خلال محفظتك</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch mt-4 zoomIn wow" data-wow-delay=".9s">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-arrow-down-left-square"></i></div>
                            <h4><a>إستلام الدفعات</a></h4>
                            <p>قم باستلام الأموال علي محفظتك من المستخدمين الأخرين</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch mt-4 zoomIn wow" data-wow-delay="1.1s">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-arrow-left-right"></i></div>
                            <h4><a>معالجة سريعة</a></h4>
                            <p>يتم معالجة جميع الطلبات غالبا في غضون اقل من 5 دقائق</p>
                        </div>
                    </div>

                    <a href="{{ route('front.services') }}" class="btn btn-warning  btn-service fs-5 p-3 text-white border-light m-auto mt-4 w-auto " >عرض جميع الخدمات   </a>
                </div>
            </div>
        </section>
        <!-- End Services Section -->
    </main>
    <!-- End #main -->
@endsection

@section('scripts')

@endsection

