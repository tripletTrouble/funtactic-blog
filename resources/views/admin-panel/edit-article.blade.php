@extends('layouts.admin-panel')

@section('content')
    <main class="w-11/12 mx-auto mb-7">
        <p class="text-xl font-bold text-center text-blue-300 mb-5">Sunting Artikel</p>
        @if ($errors->any())
            <div class="border p-5 border-red-400 h-24 overflow-y-scroll rounded-lg mb-5">
                <p class="text-red-400 mb-2 font-bold text-sm">Data gagal disimpan! </p>
                <ul class="list-disc mx-3 text-red-400 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="border p-5 border-blue-400 rounded-lg mb-5">
                <p class="text-blue-400 text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <form action="{{ url('/articles') }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $article['id'] }}">
            <label class="label-flex" for="title">
                Judul Artikel:
                <input class="form-control" type="text" name=" title" id="title" placeholder="Tulis judul artikel..."
                    value="{{ old('title') ?? $article['title'] }}" required>
            </label>
            <label class="label-flex" for="thumbnail_url">
                Thumbnail URL:
                <input class="form-control" type="text" name=" thumbnail_url" id="thumbnail_url"
                    placeholder="https://example.com/123" value="{{ old('thumbnail_url') ?? $article['thumbnail_url'] }}"
                    required>
            </label>
            <label class="label-flex" for="thumbnail_source">
                Thumbnail Source:
                <input class="form-control" type="text" name="thumbnail_source" id="thumbnail_source"
                    placeholder="Contoh: John Doe via Unsplash"
                    value="{{ old('thumbnail_source') ?? $article['thumbnail_source'] }}" required>
            </label>
            <label class="text-sm text-blue-300" for="body">Isi Artikel:</label>
            <textarea class="border border-blue-200 text-blue-300 rounded-lg mx-auto block p-5 text-sm w-11/12 mt-3 placeholder:text-blue-200 placeholder:opacity-90"
                name="body" id="body" rows="10" required
                placeholder="Lorem ipsum ...">{{ old('body') ?? $article['body'] }}</textarea>
            <div class="p-5 border rounded-lg w-11/12 mx-auto hidden text-sm max-h-72 overflow-scroll" id="preview"></div>
            <span
                class="text-xs p-2 rounded-lg block w-fit mx-auto bg-blue-300 mt-3 text-white font-semibold cursor-pointer"
                onclick="previewText(this)">Preview</span>
            <span
                class="text-xs p-2 rounded-lg w-fit mx-auto bg-blue-300 mt-3 text-white font-semibold hidden cursor-pointer"
                onclick="backWriting(this)">Kembali Menulis</span>
            <label class="label-flex" for="category">
                Kategori Artikel:
                <select class="form-control" id="category" name="category_id" id="category_id" required>
                    <option selected disabled> -- Pilih Kategori -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($category['id'] == old('category_id') || $category['id'] == $article['category_id'])>{{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label class="label-flex" for="tags">
                Tags (pisahkan dengan tanda koma):
                <input class="form-control" type="text" name="tags" id="tags" placeholder="Contoh: crypto, teknologi"
                    value="{{ old('tags') ?? $article['tags'] }}">
            </label>
            <button class="block w-full bg-emerald-300 text-white font-bold py-2 rounded-lg mt-5" type="submit"><i
                    class="bi bi-send-fill"></i>
                Simpan Artikel</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/showdown@2.1.0/dist/showdown.min.js"></script>
    <script>
        var articleBody = document.getElementById('body')
        var preview = document.getElementById('preview')
        var converter = new showdown.Converter()

        function convert(text) {
            var html = converter.makeHtml(text)
            preview.innerHTML = html
        }

        convert(articleBody.value)

        articleBody.addEventListener('keyup', function() {
            convert(articleBody.value)
        })

        function previewText(event) {
            articleBody.classList.add('hidden')
            preview.classList.remove('hidden')
            event.classList.replace('block', 'hidden')
            event.nextElementSibling.classList.replace('hidden', 'block')
        }

        function backWriting(event) {
            articleBody.classList.remove('hidden')
            preview.classList.add('hidden')
            event.classList.replace('block', 'hidden')
            event.previousElementSibling.classList.replace('hidden', 'block')
        }
    </script>
@endsection
