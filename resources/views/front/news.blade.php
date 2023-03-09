
@extends('front.parent')

@section('title' , 'الاخبار')

@section('styles')
<style>
    @media (max-width: 991px) {
        img {
            height: 220px !important;
        }
    }
</style>
@endsection

@section('content')
    <!-- ======= main Section ======= -->

    <main id="main mt-5">
        <div class="container my-4">
            <div class="row mt-5" style="margin-top: 140px !important;">

                @foreach($articles as $article)

                    <div class="col-md-6 ">
                        <div class="card mb-4 ">
                            <img src="{{asset('storage/images/article/' . $article->image)}}" class="card-img-top img-fluid"
                                style="height: 350px" alt="News Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->short_description }}</p>
                                <a href="#" class="btn btn-primary"> اقرا المزيد</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="paginate d-flex justify-content-center">
                    {{$articles->links()}}
                </div>

                </div>
            </div>
    </main>
    <!-- End #main -->
@endsection

@section('scripts')

@endsection

