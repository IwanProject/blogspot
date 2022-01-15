@extends('dashboard.layouts.main')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid mt-5">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Dashboard</h2>

            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Posts
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $posts }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Categories
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $categories }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="dashboard-card-title">
                                    Users
                                </div>
                                <div class="dashboard-card-subtitle">
                                    {{ $users }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
