@extends('layouts.layouts')

@section('content')

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
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-group first">
                                    <label for="email">Email address</label>
                                    <input type="email" name="email"
                                        class="form-control  @error('email') is-invalid @enderror" id="email"
                                        placeholder="name@example.com" autocomplete="off" autofocus
                                        value="{{ old('email') }}">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Password">
                                </div>

                                <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
                            </form>
                            <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register
                                    Now</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
