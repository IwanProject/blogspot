@extends('dashboard.layouts.main')


@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Posts</h2>
                <p class="dashboard-subtitle">
                    Update Posts
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">

                    <div class="col-md-8">
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" autocomplete="off" name="title" class="form-control" id="title"
                                    value="{{ $post->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" autocomplete="off" name="slug" class="form-control" id="slug"
                                    value="{{ $post->slug }}">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select " name="category_id">
                                    @foreach ($categories as $category)
                                        @if (old('category_id', $post->category_id) == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                @if ($post->image)
                                    <img src="{{ asset('post-image/' . $post->image) }}"
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <input id="body" type="hidden" name="body" value="{{ $post->body }}">
                                <trix-editor input="body"></trix-editor>
                            </div>
                            <button type="submit" class="btn btn-primary mb-5">Update Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
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
