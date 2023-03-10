
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
                                style="height: 350px" alt=" Image">
                            <div class="card-body">
                                <div class="top d-flex justify-content-between">
                                    <h5 class="card-title">{{ $article->title }}</h5>
                                    <p class="card-text">{{ $article->created_at }}</p>

                                </div>
                                <p class="card-text">{{ $article->short_description }}</p>
                                <a href="#" class="btn btn-primary text-light" > اقرا المزيد</a>

                            </div>
                        </div>

                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Launch demo modal
                        </button> --}}

                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $article->title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{asset('storage/images/article/' . $article->image)}}" class="card-img-top img-fluid"
                                    style="height: 350px" alt=" Image">
                                    {{ $article->short_description }}
                                    <br>
                                    {{ $article->full_description }}

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- Modal -->


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

