@extends('dashboard.layouts.main')


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Post Review</h2>
                <p class="dashboard-subtitle">
                    Post of Review
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="table_id">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)

                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->category->name }}</td>
                                                    <td>
                                                        {{-- <a href="/dashboard/review/{{ $post->slug }}"
                                                            class="badge bg-info"> <span class="posts-icons"
                                                                data-feather="eye"></span></a> --}}
                                                        {{-- <a href="/dashboard/review/publish" class="badge bg-warning"> <span
                                                                class="posts-icons" data-feather="edit"></span></a> --}}


                                                        <form action="/dashboard/post_review/publish" method="post"
                                                            class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                            <button class="badge bg-warning border-0 posts-icons"
                                                                onclick="return confirm('Yakin publish?')"><span
                                                                    data-feather="x-circle"></span></button>

                                                        </form>
                                                        <form action="/dashboard/post_review/unpublish" method="post"
                                                            class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                            <button class="badge bg-danger border-0 posts-icons"
                                                                onclick="return confirm('Yakin unpublish?')"><span
                                                                    data-feather="x-circle"></span></button>

                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
