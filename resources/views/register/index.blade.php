@extends('layouts.layouts')

@section('content')

    {{-- <div class="row justify-content-center">
        <div class="col-lg-4 ">
            <main class="form-sign-in">
                <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
                <form action="/register" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-floating">
                        <input type="text" autocomplete="off" name="name"
                            class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Name"
                            value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}

    {{-- <div class="form-floating">
        <label for="username">Username</label>
                        <input type="text" autocomplete="off" name="username"
                            class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username"
                            value="{{ old('username') }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}

    {{-- <div class="form-floating">
        <label for="email">Email address</label>
                        <input type="email" name="email" id="email" autocomplete="off"
                            class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}




    {{-- <div class="form-floating">
        <label for="password">Password</label>
                        <input type="password" autocomplete="off" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password"">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}


    {{-- <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
            </main>
        </div>
    </div> --}}



    <div class="d-md-flex half">
        <img src="{{ asset('/asset/images/bg_1.jpg') }}" class="bg" alt="">
        <div class="contents">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3>Login</h3>

                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session()->has('LoginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('LoginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                            <form action="/register" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group first">
                                    <label for="name">Name</label>
                                    <input type="text" autocomplete="off" name="name"
                                        class="form-control  @error('name') is-invalid @enderror" id="name"
                                        placeholder="Name" value="{{ old('name') }}">

                                </div>

                                <div class="form-group last mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" autocomplete="off" name="username"
                                        class="form-control @error('username') is-invalid @enderror" id="username"
                                        placeholder="Username" value="{{ old('username') }}">

                                </div>

                                <div class="form-group last mb-3">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email" id="email" autocomplete="off"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="example@example.com" value="{{ old('email') }}">

                                </div>

                                <div class="form-group last-mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" autocomplete="off" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Password">
                                </div>
                                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                            </form>
                            <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
