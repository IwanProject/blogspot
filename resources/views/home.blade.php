@extends('layouts.main')

@section('content')


    <main>

        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">{{ $first->title }}</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">

                                    <img src="{{ asset('post-image/' . $first->image) }}">
                                    <div class="trend-top-cap">
                                        <a
                                            href="/page?category={{ $first->category->slug }}">{{ $first->category->name }}</a>
                                        <h2><a href="/posts/{{ $first->slug }}">{{ $first->title }}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach ($post->skip(1)->take(3) as $posts)

                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">

                                                    <img style="height: 150px;width:250px"
                                                        src="{{ asset('post-image/' . $posts->image) }}">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span
                                                        class="color3">{{ $posts->created_at->diffForHumans() }}</span>
                                                    <a href="/page?category={{ $posts->category->slug }}"
                                                        class="color1 text-dark">{{ $posts->category->name }}</a>
                                                    <h4><a href="/posts/{{ $posts->slug }}">{{ $posts->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            @foreach ($post->skip(4)->take(4) as $posts)

                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img style="height: 200px;width:200px"
                                            src="{{ asset('post-image/' . $posts->image) }}">
                                    </div>
                                    <div class="trand-right-cap">
                                        <h4><a href="/posts/{{ $posts->slug }}">{{ $posts->title }}</a></h4>
                                        <a href="/page?category={{ $posts->category->slug }}"
                                            class="color1 text-dark">{{ $posts->category->name }}</a>
                                        <span class="color3">{{ $posts->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Trending Area End -->
        <!--   Weekly-News start -->
        <div class="weekly-news-area pt-50">
            <div class="container">
                <div class="weekly-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly-news-active dot-style d-flex dot-style">
                                @foreach ($post->skip(8)->take(6) as $posts)
                                    <div class="weekly-single">
                                        <div class="weekly-img">
                                            <img style="height:420px; width:360px"
                                                src="{{ asset('post-image/' . $posts->image) }}">
                                        </div>
                                        <div class="weekly-caption">
                                            <a href="/page?category={{ $posts->category->slug }}"
                                                class="color1 text-dark">{{ $posts->category->name }}</a>
                                            <h4><a href="/posts/{{ $posts->slug }}">{{ $posts->title }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- End Weekly-News -->



        <div class="trending-area fix" id="all-news">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="section-tittle m-30">
                        <h3>All News</h3>
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
                                        <a href="/page?category={{ $n->category->slug }}"
                                            class="color1 text-dark">{{ $n->category->name }}</a>
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
        <br>
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
