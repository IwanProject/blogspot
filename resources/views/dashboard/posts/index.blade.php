@extends('dashboard.layouts.main')


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Posts</h2>
                <p class="dashboard-subtitle">
                    List of Posts
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
                                <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100 text-center"
                                        id="table_id">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)

                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->category->name }}</td>

                                                    @if ($post->status == 'being a review')
                                                        <td><span class="badge rounded-pill bg-info text-dark">
                                                                {{ $post->status }}</span>
                                                        </td>
                                                    @endif

                                                    @if ($post->status == 'publish')
                                                        <td><span class="badge rounded-pill bg-warning text-dark">
                                                                {{ $post->status }}</span>
                                                        </td>
                                                    @endif

                                                    @if ($post->status == 'unpublish')
                                                        <td><span class="badge rounded-pill bg-danger text-dark">
                                                                {{ $post->status }}</span>
                                                        </td>
                                                    @endif

                                                    <td>
                                                        <a href="/dashboard/posts/{{ $post->slug }}"
                                                            class="badge bg-info"> <span class="posts-icons"
                                                                data-feather="eye"></span></a>
                                                        <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                                            class="badge bg-warning"> <span class="posts-icons"
                                                                data-feather="edit"></span></a>

                                                        <form action="/dashboard/posts/{{ $post->slug }}" method="post"
                                                            class="d-inline">
                                                            @method('delete')
                                                            @csrf

                                                            <button class="badge bg-danger border-0 posts-icons"
                                                                onclick="return confirm('Are you sure?')"><span
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
