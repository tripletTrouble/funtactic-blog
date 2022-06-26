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
                    value="{{ old('site_name') ?? $settings[0]['value'] }}">
            </div>
            <div class="form-col">
                <label class="form-label" for="site_logo">Logo Situs:</label>
                <input class="form-control" type="file" name="site_logo" id="site_logo">
            </div>
            <div class="form-col">
                <label class="form-label" for="site_description">Deskripsi Situs:</label>
                <textarea class="form-control" name="site_description" id="site_description" rows="5">{{ old('site_description') ?? $settings[1]['value'] }}</textarea>
                <p class="text-xs text-black">Jumlah karakter: <span id="char_sum">0</span> (Pastikan tidak lebih dari 255
                    karakter)</p>
            </div>
            <button class="btn-primary w-full" type="submit"><i
                    class="bi bi-arrow-repeat"></i> Update</button>
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
