@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title">Pengaturan Identitas Situs</p>
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
        <form action="{{ url('settings') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-col">
                <label class="form-label" for="site_name">Nama Situs:</label>
                <input class="form-control" type="text" name="site_name" id="site_name"
                    value="{{ old('site_name') ?? $settings['site_name'] }}">
            </div>
            <div class="form-col">
                <label class="form-label" for="site_logo">Logo Situs:</label>
                <input class="form-control" type="file" name="site_logo" id="site_logo" onchange="loadFile(event)">
                <p class="text-xs italic dark:text-white">Ukuran maks. 520 x 520 px (persegi) dan tidak lebih dari 400kb.</p>
                <img class="w-20 h-20 rounded-full border text-center text-xs" id="preview-image"
                    src="{{ $settings['site_logo'] ?? asset('img/logo.svg') }}" alt="Logo">
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
                <label class="form-label" for="site_description">Deskripsi Situs:</label>
                <textarea class="form-control" name="site_description" id="site_description" rows="5">{{ old('site_description') ?? $settings['site_description'] }}</textarea>
                <p class="text-xs text-black dark:text-white">Jumlah karakter: <span id="char_sum">0</span> (Pastikan tidak lebih dari 255
                    karakter)</p>
            </div>
            <button class="btn-primary w-full" type="submit"><i class="bi bi-arrow-repeat"></i> Update</button>
        </form>
    </div>
    <script>
        var descriptionInput = document.getElementById('site_description'),
            charSumEl = document.getElementById('char_sum'),
            charSum = 0

        var countCharacters = function(inputText) {
            charSum = inputText.length
            charSumEl.textContent = charSum
        }

        countCharacters(descriptionInput.value)

        descriptionInput.addEventListener('keyup', function() {
            countCharacters(this.value)
        })
    </script>
@endsection
