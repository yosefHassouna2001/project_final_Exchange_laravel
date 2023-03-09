
@extends('front.parent')

@section('title' , 'الاسئلة الشائعة')

@section('styles')

@endsection

@section('content')

    <!-- ======= main Section ======= -->
    <main id="main">
        <section class="faq mt-5">
            <div class="section-title mt-5 wow" data-wow-delay=".0s">
                <span>الأسئلة الشائعة</span>
                <h2>الأسئلة الشائعة</h2>
                <p class="wow" data-wow-delay=".1s">
                    اليك بعض الاسئلة المتكرره واجابتها
                </p>
            </div>
            <div class="d-flex justify-content-center">
                <div class="accordion col-md-8 col-xl-6 col-lg-7 col-11">
                        <div class="accordion-item wow" data-wow-delay=".2s">
                            <h2 class="accordion-header" id="panelsStayOpen-heading1">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1">
                                    هل يمكنني استخدام الموقع بدون انشاء حساب
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show " aria-labelledby="panelsStayOpen-heading1">
                                <div class="accordion-body">
                                    <p>لا يمكنك ذلك ، يجب عليك تسجيل حساب اولاً</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow" data-wow-delay=".3s">
                            <h2 class="accordion-header" id="panelsStayOpen-heading2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="true" aria-controls="panelsStayOpen-collapse2">
                                    ما هي مواعيد عمل الموقع
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading2">
                                <div class="accordion-body">
                                    <p>&nbsp;الموقع يعمل علي مدار 24 ساعة يوميا</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow" data-wow-delay=".4s">
                            <h2 class="accordion-header" id="panelsStayOpen-heading3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="true" aria-controls="panelsStayOpen-collapse3">
                                    ما هي مدة معالجة عمليات الايداع والسحب
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading3">
                                <div class="accordion-body">
                                    <p>مدة معالجة الطلبات هي من 5 دقائق الي 48 ساعة وذلك على حسب دورك وضغط المعاملات</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow" data-wow-delay=".5s">
                            <h2 class="accordion-header" id="panelsStayOpen-heading4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="true" aria-controls="panelsStayOpen-collapse4">
                                    هل الاسعار ثابتة ام متغيرة
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading4">
                                <div class="accordion-body">
                                    <p>الأسعار متغيرة بحيث يمكن أن تتغير الأسعار كل ثانية بالعملات الرقمية ويومياً في حالة العملات الثابتة مثل الدولار وغيرها</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow" data-wow-delay=".6s">
                            <h2 class="accordion-header" id="panelsStayOpen-heading5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse5" aria-expanded="true" aria-controls="panelsStayOpen-collapse5">
                                    هل يمكن للموقع التعامل مع المبالغ الكبيرة
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse5" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading5">
                                <div class="accordion-body">
                                    <p>بالتاكيد يمكننا ذلك ولكن قد يستغرق الموضوع وقت اكبر عن باقي العمليات الاخري علي حسب المبلغ</p>
                                </div>
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


