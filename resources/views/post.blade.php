@extends('layouts.main')

@section('content')

    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <h2>{{ $post->title }} </h2>
                            <img class="img-fluid" src="{{ asset('post-image/' . $post->image) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <ul class="blog-info-link  mb-4">
                                <li><a href="/page?author={{ $post->author->username }}"><i
                                            class="fa fa-user"></i>{{ $post->author->name }}</a></li>
                                <li><a href="#">{{ date_format($post->created_at, 'd-m-Y') }}</a></li>
                                <li><a href="/page?category={{ $post->category->slug }}"><i
                                            class="fas fa-th-large"></i>{{ $post->category->name }}</a></li>
                            </ul>

                            <article class="my-3 fs-5">
                                {!! $post->body !!}
                            </article>
                        </div>
                    </div>
                    <div class="navigation-top">

                        <div class="navigation-area">
                            <div class="row">
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="/posts/{{ $posts[0]->slug }}">
                                            <img class="img-fluid" style="height: 65px; width:150px"
                                                src="{{ asset('post-image/' . $posts[0]->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="/posts/{{ $posts[0]->slug }}">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="/posts/{{ $posts[0]->slug }}">
                                            <h4>{{ $posts[0]->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="/posts/{{ $posts[1]->slug }}">
                                            <h4>{{ $posts[1]->title }}</h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="/posts/{{ $posts[1]->slug }}">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="/posts/{{ $posts[1]->slug }}">
                                            <img class="img-fluid" style="height: 65px; width:150px"
                                                src="{{ asset('post-image/' . $posts[1]->image) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        @comments([
                        'model' => $post,

                        ])

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Categories</h4>
                            <ul class="list cat-list">
                                @foreach ($categories as $c)

                                    <li>
                                        <a href="/page?category={{ $c->slug }}" class="d-flex">
                                            <p>{{ $c->name }}</p>

                                        </a>
                                    </li>

                                @endforeach
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($news as $n)

                                <div class="media post_item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img style="height:50px; width:50px"
                                                src="{{ asset('post-image/' . $n->image) }}" alt="">
                                        </div>
                                        <div class="col-md-8">

                                            <div class="media-body">
                                                <a href="/posts/{{ $n->slug }}">
                                                    <h3>{{ $n->title }}</h3>
                                                </a>
                                                <p>{{ date_format($n->created_at, 'd-m-Y') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
