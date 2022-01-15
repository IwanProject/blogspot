@extends('dashboard.layouts.main')

@section('content')


    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Account {{ $users[0]->name }}</h2>
                <p class="dashboard-subtitle">
                    Details your account
                </p>
                <div class="col-md-8">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-8">

                        <form action="/dashboard/account/{{ $users[0]->id }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ $users[0]->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" autocomplete="off" name="name" class="form-control" id="name"
                                    value="{{ $users[0]->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" autocomplete="off" name="username" class="form-control" id="username"
                                    value="{{ $users[0]->username }}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" autocomplete="off" name="email" class="form-control" id="email"
                                    value="{{ $users[0]->email }}">
                            </div>


                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="hidden" name="oldImage" value="{{ $users[0]->image }}">
                                @if ($users[0]->image)
                                    <img src="{{ asset('post-image/' . $users[0]->image) }}"
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                            </div>
                            <button type="submit" class="btn btn-primary mb-5">Update Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.Files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>

@endsection
