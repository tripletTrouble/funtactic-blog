@extends('layouts/admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="text-lg lg:text-xl 2xl:text-2xl font-bold text-center text-rose-600 mb-5">Buat Artikel Baru</p>
        @if ($errors->any())
            <div class="border p-5 border-red-600 h-24 overflow-y-scroll rounded-lg mb-5">
                <p class="text-red-600 mb-2 font-bold text-sm">Data gagal disimpan! </p>
                <ul class="list-disc mx-3 text-red-600 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="border p-5 border-blue-700 rounded-lg mb-5">
                <p class="text-blue-700 text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <form action="{{ url('/articles') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-col">
                <label class="form-label" for="title">Judul Artikel:</label>
                <input class="form-control" type="text" name=" title" id="title"
                    placeholder="Tulis judul artikel..." value="{{ old('title') ?? '' }}" required>
            </div>
            <div class="form-col">
                <label class="form-label" for="thumbnail_image">Thumbnail URL:</label>
                <input class="form-control" type="file" name=" thumbnail_image" id="thumbnail_image" required>
            </div>
            <div class="form-col">
                <label class="form-label" for="thumbnail_source"> Thumbnail Source:</label>
                <input class="form-control" type="text" name="thumbnail_source" id="thumbnail_source"
                    placeholder="Contoh: John Doe via Unsplash" value="{{ old('thumbnail_source') ?? '' }}" required>
            </div>
            <div class="form-col">
                <label class="form-label" for="body">Isi Artikel:</label>
                <textarea class="text-control" name="body" id="body" rows="10" value="{{ old('body') ?? '' }}" required
                    placeholder="Let's write something great ...">{{ old('body') }}</textarea>
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
                        <option value="{{ $category['id'] }}" @selected($category['id'] == old('category_id'))>{{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-col">
                <label class="form-label" for="tags">Tags (pisahkan dengan tanda koma):</label>
                <input class="form-control" type="text" name="tags" value="{{ old('tags') ?? '' }}" id="tags"
                    placeholder="Contoh: crypto, teknologi">
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
