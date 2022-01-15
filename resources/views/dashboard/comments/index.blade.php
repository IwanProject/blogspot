@extends('dashboard.layouts.main')


@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Comments</h2>
                <p class="dashboard-subtitle">
                    List of Comments
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
                                    <table class="table table-hover scroll-horizontal-vertical w-100 text-center"
                                        id="table_id">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Comments</th>
                                                <th scope="col">Status</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comment as $comments)

                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $comments->comment }}</td>


                                                    @if ($comments->status == 'being a review')
                                                        <td><span class="badge rounded-pill bg-info text-dark">
                                                                {{ $comments->status }}</span>
                                                        </td>
                                                    @endif

                                                    @if ($comments->status == 'publish')
                                                        <td><span class="badge rounded-pill bg-warning text-dark">
                                                                {{ $comments->status }}</span>
                                                        </td>
                                                    @endif

                                                    @if ($comments->status == 'unpublish')
                                                        <td><span class="badge rounded-pill bg-danger text-dark">
                                                                {{ $comments->status }}</span>
                                                        </td>
                                                    @endif


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
