
@extends('front.parent')

@section('title' , 'الارشيف')

@section('styles')
    <!-- date -->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

@endsection

@section('content')

    <!-- ======= main Section ======= -->
    <main id="main">
        <section class="faq mt-5 container">

            <div class="row m-auto mt-4">
                <div class=" col-md-10 wow m-auto" data-wow-delay="0.5s" >
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="card-title py-1 my-2 w-50">ارشيف العملات </h3>
                        <div class="col-xs-5 date rounded-2 w-50 ">
                            <div class="input-group date form-control " id="datePicker">
                                <input type="text" class="form-control rounded-start border-0" name="date" />
                                <span class=" add-on border-0 bg-transparent"><button class="h-100 btn d-flex align-items-center"><i class="fa-solid fa-calendar-days"></i></button></span>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class=" m-auto text-center table table-hover table-striped wow zoomIn table-bordered"data-wow-delay="1s" >

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
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                </div>
            </div>

        </section>

    </main>
    <!-- End #main -->

@endsection

@section('scripts')

@endsection
