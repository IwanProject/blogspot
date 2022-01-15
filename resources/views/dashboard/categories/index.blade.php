@extends('dashboard.layouts.main')


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Categories</h2>
                <p class="dashboard-subtitle">
                    List of Categories
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
                                <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new
                                    categories</a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="table_id">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Slug</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->slug }}</td>
                                                    <td>
                                                        {{-- <a href="/dashboard/categories/{{ $category->slug }}"
                                                            class="badge bg-info"><span data-feather="eye"></span></a> --}}
                                                        <a href="/dashboard/categories/{{ $category->slug }}/edit"
                                                            class="badge bg-warning"><span data-feather="edit"></span></a>

                                                        <form action="/dashboard/categories/{{ $category->slug }}"
                                                            method="post" class="d-inline">
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
