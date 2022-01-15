@extends('dashboard.layouts.main')


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Users</h2>
                <p class="dashboard-subtitle">
                    Management Users
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>
                                                        @if ($user->is_admin == null)
                                                            {{ 'USER' }}
                                                        @elseif($user->is_admin == 1)
                                                            {{ 'ADMIN' }}
                                                        @elseif($user->is_admin == 2)
            
                                                            {{'PUBLISHER'}}
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <a href="/dashboard/users/{{ $user->id }}/edit"
                                                            class="badge bg-warning"><span data-feather="edit"></span></a>

                                                        <form action="/dashboard/users/{{ $user->id }}" method="post"
                                                            class="d-inline">
                                                            @method('delete')
                                                            @csrf

                                                            <button class="badge bg-danger border-0"
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
