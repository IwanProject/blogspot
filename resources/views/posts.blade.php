@extends('layouts.main')


@section('container')

    <h1 class="mb-3 text-center"> {{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" autocomplete="off" class="form-control" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>





    @if ($post->count())

        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="card-img-top"
                alt="{{ $post[0]->category->name }}">
            <div class="card-body text-center">
                <h5 class="card-title"><a class="text-decoration-none text-dark"
                        href="/posts/{{ $post[0]->slug }}">{{ $post[0]->title }}</a></h5>
                <p>
                    <small class="text-muted"> By <a class="text-decoration-none"
                            href="/posts?author={{ $post[0]->author->username }}">{{ $post[0]->author->name }}</a> in
                        <a class="text-decoration-none"
                            href="/posts?category={{ $post[0]->category->slug }}">{{ $post[0]->category->name }}</a>
                        {{ $post[0]->created_at->diffForHumans() }}</small>
                </p>

                <p class="card-text">{{ $post[0]->excerpt }}</p>

                <a href="/posts/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($post->skip(1) as $posts)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="position-absolute px-3 py-2" style="background-color:rgba(238, 14, 14, 0.7)">
                                <a class="text-white text-decoration-none"
                                    href="/posts?category={{ $posts->category->slug }}">{{ $posts->category->name }}</a>
                            </div>

                            <img src="https://source.unsplash.com/500x400?{{ $posts->category->name }}"
                                class="card-img-top" alt="{{ $posts->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><a class="text-decoration-none"
                                        href="/posts/{{ $posts->slug }}">{{ $posts->title }}</a></h5>
                                <p>
                                    <small class="text-muted"> By <a class="text-decoration-none"
                                            href="/posts?author={{ $posts->author->username }}">{{ $posts->author->name }}</a>
                                        in
                                        {{ $posts->created_at->diffForHumans() }}</small>
                                </p>

                                <p class="card-text">{{ $posts->excerpt }}</p>
                                <a href="/posts/{{ $posts->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
    <div class="pagination mt-3">
        {{ $post->links() }}

    </div>


@endsection
