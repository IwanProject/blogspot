@extends('layouts.main')

@section('content')

    <main>



        @if ($news->count())
            <div class="trending-area fix" id="all-news">
                <div class="container">
                    <div class="trending-main">
                        <!-- Trending Tittle -->
                        <div class="section-tittle mb-30 mt-30">
                            <h3>Search: {{ request()->search }}</h3>
                        </div>

                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($news as $n)
                                    <div class="col-lg-4 mb-5">
                                        <div class="trend-bottom-img mb-30">
                                            <img style="height: 200px;width:350px"
                                                src="{{ asset('post-image/' . $n->image) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="trend-bottom-cap">
                                            <span class="color1">{{ $n->category->name }}</span>
                                            <h4><a href="/posts/{{ $n->slug }}">{{ $n->title }}</a></h4>
                                            <span class="color3">{{ $n->created_at->diffForHumans() }}</span>

                                        </div>
                                    </div>

                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @else
            <p class="text-center fs-4 mt-30"> "<strong>{{ request()->search }}</strong>" tidak ditemukan</p>
        @endif


        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
