@extends('dashboard.layouts.main')

@section('content')


    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit Management Users</h2>

            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-8">

                        <form action="/dashboard/users/{{ $users->id }}" method="post">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" autocomplete="off" name="name" class="form-control" id="name"
                                    value="{{ $users->name }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" autocomplete="off" name="username" class="form-control" id="username"
                                    value="{{ $users->username }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="roles" class="form-label">Role</label>
                                <select class="form-select" name="is_admin">
                                    <option value="0">USER</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">PUBLISHER</option>
                                    
                                    
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-5">Update Users</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
