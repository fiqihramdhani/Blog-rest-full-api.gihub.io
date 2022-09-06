@extends('Dashboard.Layout.Main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">New Post</h1>
    </div>
    <div class="container">
        <div class="col-lg-6">
            <form action="/Dashboard/Posts" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control  @error('Title') is-invalid @enderror " id="title"
                        name="Title" autofocus value="{{ old('title') }}" required>
                    @error('Title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3 mt-3">
                        <img class="img-preview img-fluid">
                        <label for="img" class="form-label @error('img') is-invalid @enderror ">Image</label>
                        <input class="form-control" type="file" id="image" name="img" onchange="previewImage()">
                    </div>
                    @error('img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="judul-posting" class="form-label">Judul Posting</label>
                        <input type="text" class="form-control @error('Judul_Posting') is-invalid @enderror"
                            id="judul-posting" name="Judul_Posting" value="{{ old('Judul_Posting') }}" required>
                        @error('Judul_Posting')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">

                            @foreach ($Category as $Categories)
                                @if (old('category_id') == $Categories->id)
                                    <option value="{{ $Categories->id }}" selected>{{ $Categories->Nama }}</option>
                                @else
                                    <option value="{{ $Categories->id }}">{{ $Categories->Nama }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <input id="body" type="hidden" name="Body" value="{{ old('Body') }}">
                        <trix-editor input="body"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        const Title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/Dashboard/Posts/checkSlug?Title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)



        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = "block";

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
