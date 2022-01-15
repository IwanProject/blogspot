@extends('dashboard.layouts.main')


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Comments Review</h2>
                <p class="dashboard-subtitle">
                    Comments of Review
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
                                                <th scope="col">comment</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comment as $comments)

                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $comments->comment }}</td>
                                                    <td>



                                                        <form action="/dashboard/comments_review/publish" method="post"
                                                            class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="comments_id"
                                                                value="{{ $comments->id }}">
                                                            <button class="badge bg-warning border-0 posts-icons"
                                                                onclick="return confirm('Yakin publish?')"><span
                                                                    data-feather="x-circle"></span></button>

                                                        </form>
                                                        <form action="/dashboard/comments_review/unpublish" method="post"
                                                            class="d-inline">
                                                            @csrf
                                                            <input type="hidden" name="comments_id"
                                                                value="{{ $comments->id }}">
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
