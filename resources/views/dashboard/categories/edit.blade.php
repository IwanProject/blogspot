@extends('dashboard.layouts.main')


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Categories</h2>
                <p class="dashboard-subtitle">
                    Update Categories
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-8">

                        <form action="/dashboard/categories/{{ $categories->slug }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Categories Name</label>
                                <input type="text" autocomplete="off" name="name" class="form-control" id="name"
                                    value="{{ $categories->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" autocomplete="off" name="slug" class="form-control" id="slug"
                                    value="{{ $categories->slug }}">
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="hidden" name="oldImage" value="{{ $categories->image }}">
                                @if ($categories->image)
                                    <img src="{{ asset('post-image/' . $categories->image) }}"
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                            </div>


                            <button type="submit" class="btn btn-primary mb-5">Update Categories</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script scr="text/javascript">
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('keyup', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

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
