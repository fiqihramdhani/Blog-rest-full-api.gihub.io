@extends('Dashboard.Layout.Main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
    <div class="container">
        <div class="col-lg-6">
            <form action="/Dashboard/Posts/{{ $Post->slug }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control  @error('Title') is-invalid @enderror " id="title"
                        name="Title" autofocus value="{{ old('title', $Post->Title) }}" required>
                    @error('Title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    @if ($Post->img)
                        <img src="{{ asset('storage/' . $Post->img) }}" class="img-preview img-fluid d-block">
                    @else
                        <img class="img-preview img-fluid">
                    @endif
                    <label for="img" class="form-label">Image</label>
                    <input type="hidden" value="{{ $Post->img }}" name="oldImage">
                    <input type="file" class="form-control  @error('Img') is-invalid @enderror " id="image"
                        name="img" autofocus value="{{ old('img', $Post->img) }}" onchange="previewImage()" required>
                    @error('Img')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="judul-posting" class="form-label">Judul Posting</label>
                    <input type="text" class="form-control @error('Judul_Posting') is-invalid @enderror"
                        id="judul-posting" name="Judul_Posting" value="{{ old('Judul_Posting', $Post->Judul_Posting) }}"
                        required>
                    @error('Judul_Posting')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug', $Post->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Category" class="form-label">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">

                        @foreach ($Categories as $Category)
                            @if (old('category_id', $Post->Category->id) == $Category->id)
                                <option value="{{ $Category->id }}" selected>{{ $Category->name }}</option>
                            @else
                                <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <input id="body" type="hidden" name="Body" value="{{ old('Body', $Post->Body) }}">
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
