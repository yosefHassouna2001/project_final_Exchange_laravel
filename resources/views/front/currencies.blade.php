
@extends('front.parent')

@section('title' , 'اسعار العملات')

@section('styles')

@endsection

@section('content')
    <!-- ======= main Section ======= -->
    <main id="main">
        <section class="faq mt-5 container">
            <div class="row m-auto row-cols-1">
                <div class=" col-md-10 col-center m-auto">
                    <h2 class="text-center mb-5 mt-3 wow" data-wow-delay=".0s">محول العملات الأجنبية</h2>
                    <table class=" m-auto text-center   wow zoomIn" data-wow-delay=".3s" >
                        <tbody class="d-grid d-md-block align-items-center">

                        <tr class="fs-5">
                            <th class="d-block text-sm-center mb-sm-1 ">اختر النوع
                            </th>
                            <th>
                                <div class="form-group d-flex me-3 bg-dangerp mt-3 ">
                                    <button type="button" style="white-space: nowrap;" class="btn border w-50 border-bottom-2 btn-outline-secondary active text-light text-secondary mx-3">شراء العملات الاجنبية</button>
                                    <button type="button" style="white-space: nowrap;" class="btn border w-50 border-bottom-2 btn-outline-secondary text-secondary"> بيع العملات الاجنبية</button>
                                </div>
                            </th>
                        </tr>

                        <tr class="fs-5 ">
                            <th class="d-block text-sm-center mb-sm-1 mt-3 mt-sm-3">اختر العملة
                            </th>
                            <th>
                                <div class="d-flex align-items-center mt-3 justify-content-between me-3">
                                    <span class="mx-3 fw-lighter">من</span>
                                    <select class="form-select form-select-sm " style="min-width: fit-content;" aria-label=".form-select-sm example">
                                        <option selected>الدولار </option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <span class="mx-3 fw-lighter">الى</span>
                                    <select class="form-select form-select-sm" style="min-width: fit-content;" aria-label=".form-select-sm example">
                                        <option selected>الشيكل </option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>

                                </div>
                            </th>
                        </tr>
                        <tr class="fs-5 ">
                            <th class="d-block text-sm-center mt-sm-3" > ادخل المبلغ
                            </th>
                            <th>
                                <div class="form-group d-flex me-3 mt-2">
                                    <div class=" d-flex align-items-center ">
                                        <span class="mx-2 fw-lighter text-uppercase " >USD</span>
                                        <img src="assets/images/flag/flag-1.jpg " class=" ms-1 " alt="">

                                        <input type="text" inputmode="numeric"  style="min-width: 60px;" maxlength="7" class="currency-send form-control p-1" value="1" placeholder="0">
                                    </div>
                                    <span class="switcher m-3 text-primary"><i class="fa-thin fa-right-left"></i></span>
                                    <div class="d-flex align-items-center">
                                        <span class="mx-2 fw-lighter text-uppercase " >ILS</span>
                                        <img src="assets/images/flag/flag-2.jpg" class=" ms-1" alt="">

                                        <input type="text" inputmode="numeric"  style="min-width: 60px;" maxlength="7" class="currency-receive form-control p-1" value="3.60" placeholder="0">
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </tbody>

                    </table>

                    <p class="text-center wow p-2"data-wow-delay="0.5s" ><span >سعر الصرف 1 <span id="rate-note-currency"><b>USD</b></span></span> = <span class="exchange-res-val"> <span id="rate-note">3.60</span> <span id="rate-note-athor"><b>ILS</b></span> </span></p>

                </div>
            </div>



            <div class="row m-auto mt-3">
                <div class=" col-md-10 wow m-auto" data-wow-delay="0.5s" >
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title py-1">اسعار صرف العملات مقابل الشيكل</h3>
                <p>📌 ملاحظة هامة الأسعار قابلة للتغير حسب التداول في السوق المحلي والبورصة  </p>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class=" m-auto text-center table table-hover table-striped wow zoomIn table-bordered"data-wow-delay="0.7s" >

                            <thead>
                            <tr class="fs-5">
                                <th class="text-primary ">العملة </th>
                                <th class="text-primary ">سعر الشراء</th>
                                <th class="text-primary ">سعر البيع</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class=" fs-5"><img src="assets/images/flag/flag-1.jpg" class=" ms-3" alt=""><span>الدولار</span></th>
                                <td>
                                    3.52
                                </td>
                                <td>3.53</td>
                            </tr>
                            <tr>
                                <th class=" fs-5"><img src="assets/images/flag/flag-1.jpg" class=" ms-3" alt=""><span>الدولار</span></th>
                                <td>
                                    3.52
                                </td>
                                <td>3.53</td>
                            </tr>
                            <tr>
                                <th class=" fs-5"><img src="assets/images/flag/flag-1.jpg" class=" ms-3" alt=""><span>الدولار</span></th>
                                <td>
                                    3.52
                                </td>
                                <td>3.53</td>
                            </tr>
                            <tr>
                                <th class=" fs-5"><img src="assets/images/flag/flag-1.jpg" class=" ms-3" alt=""><span>الدولار</span></th>
                                <td>
                                    3.52
                                </td>
                                <td>3.53</td>
                            </tr>
                            <tr class="fw-bold  ">
                                <td class="fs-5"><i class="fa-solid fa-arrows-rotate"></i> آخر تحديث : </td>
                                <td>
                                    <span class="date"> 2022-11-01 </span> الساعة <span class="time"> 11:53 </span>
                                </td>
                                <td>
                                    <a href="archef.html" class="btn btn-primary btn-sm mx-auto me-4 text-white">الأرشيف</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix d-flex justify-content-center">
                      <ul class="pagination pagination-sm m-0  ">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>

        </section>

    </main>
    <!-- End #main -->

@endsection

@section('scripts')

@endsection


