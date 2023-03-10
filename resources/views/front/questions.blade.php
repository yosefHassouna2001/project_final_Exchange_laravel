
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
                    @foreach($questions as $question)
                        <div class="accordion-item wow" data-wow-delay=".2s">
                            <h2 class="accordion-header" id="panelsStayOpen-heading{{ $question->id }}">
                                <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $question->id }} " aria-expanded="true" aria-controls="panelsStayOpen-collapse{{ $question->id }}">
                                    {{ $question->title }}
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapse{{ $question->id }}" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading{{ $question->id }}">
                                <div class="accordion-body">
                                    <p>
                                        {{ $question->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
            </div>

        </section>
    </main>
    <!-- End #main -->
@endsection

@section('scripts')

@endsection


