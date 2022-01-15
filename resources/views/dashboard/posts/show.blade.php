@extends('dashboard.layouts.main')

@section('content')
    <div class="container">

        <div class="row my-3">
            <div class="col-lg-8">
                <div class="container-fluid">
                    <h1>{{ $post->title }}</h1>



                    @if ($post->image)

                        <div style="max-height:350px; overflow:hidden">
                            <img src="{{ asset('post-image/' . $post->image) }}" alt="{{ $post->category->name }}"
                                class="img-fluid mt-3">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                            alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    @endif



                    <article class="my-3 fs-6 ">

                        {!! $post->body !!}
                    </article>
                </div>

            </div>
        </div>
    </div>

@endsection
