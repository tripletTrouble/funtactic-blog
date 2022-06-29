@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title">Sunting Artikel</p>
        @if ($errors->any())
            <div class="alert-error">
                <p class="alert-title">Data gagal disimpan! </p>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert-success">
                <p class="alert-title">{{ session('success') }}</p>
            </div>
        @endif
        <form action="{{ url('articles/' . $article['uuid']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-col">
                <label class="form-label" for="title">Judul Artikel:</label>
                <input class="form-control" type="text" name=" title" id="title"
                    placeholder="Tulis judul artikel..." value="{{ old('title') ?? $article['title'] }}" required>
            </div>
            <div class="form-col">
                <label class="form-label" for="excerpt">Deskripsi singkat (excerpt):</label>
                <input class="form-control" type="text" name=" excerpt" id="excerpt"
                    placeholder="Tulis deskripsi artikel..." value="{{ old('excerpt') ?? $article['excerpt'] }}" required>
            </div>
            <div class="form-col">
                <label class="form-label" for="thumbnail_image">Thumbnail Image:</label>
                <input class="form-control" type="file" name=" thumbnail_image" id="thumbnail_image" onchange="loadFile(event)">
                <p class="text-xs italic">Ukuran maks. 1280x720 px dan tidak lebih dari 400kb.</p>
                <img width="240" height="135" src="{{ asset('storage/' . $article['thumbnail_image']) }}" id="preview-image">
                <script>
                    var loadFile = function(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('preview-image');
                            output.src = reader.result;
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    };
                </script>
            </div>
            <div class="form-col">
                <label class="form-label" for="thumbnail_credit"> Thumbnail Credit:</label>
                <input class="form-control" type="text" name="thumbnail_credit" id="thumbnail_credit"
                    placeholder="Contoh: John Doe via Unsplash" value="{{ old('thumbnail_credit') ?? $article['thumbnail_credit'] }}"
                    required>
            </div>
            <div class="form-col">
                <label class="form-label" for="body">Isi Artikel:</label>
                <textarea class="text-control" name="body" id="body" rows="10"
                    value="{{ old('body') ?? $article['body'] }}" required placeholder="Let's write something great ...">{{ old('body') ?? $article['body'] }}</textarea>
                <div class="text-preview hidden" id="preview">
                </div>
                <span class="btn-info w-full" onclick="previewText(this)">Preview</span>
                <span class="btn-info hidden w-full" onclick="backWriting(this)">Kembali Menulis</span>
            </div>
            <div class="form-col">
                <label class="form-label" for="category">Kategori Artikel:</label>
                <select class="form-control" id="category" name="category_id" id="category_id" required>
                    <option selected disabled> -- Pilih Kategori -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($category['id'] == (old('category_id') ?? $article['category_id']))>{{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-col">
                <label class="form-label" for="tags">Tags (pisahkan dengan tanda koma):</label>
                <input class="form-control" type="text" name="tags" value="{{ old('tags') ?? $article['tags'] }}"
                    id="tags" placeholder="Contoh: crypto, teknologi">
            </div>
            <button class="btn-primary w-full" type="submit"><i class="bi bi-send-fill"></i>
                Simpan Artikel</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
    <script>
        var converter = new showdown.Converter()
        var articleBody = document.getElementById('body')

        function convert(text) {
            var html = converter.makeHtml(text)
            preview.innerHTML = html
        }

        convert(articleBody.value)

        articleBody.addEventListener('keyup', function() {
            convert(articleBody.value)
        })

        function previewText(event) {
            var preview = document.getElementById('preview')

            articleBody.style.display = 'none'
            preview.classList.remove('hidden')
            event.classList.add('hidden')
            event.nextElementSibling.classList.remove('hidden')
        }

        function backWriting(event) {
            var preview = document.getElementById('preview')

            articleBody.style.display = 'block'
            preview.classList.add('hidden')
            event.classList.add('hidden')
            event.previousElementSibling.classList.remove('hidden')
        }
    </script>
@endsection
