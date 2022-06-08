@extends('layouts.admin-panel')

@section('content')
    <div class="w-11/12 mx-auto mb-7">
        <p class="text-xl font-bold text-center text-blue-300 mb-5">Pengaturan Identitas Situs</p>
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
        <form action="{{ url('settings') }}" method="post">
            @csrf
            @method('PUT')
            <label class="label-flex" for="site_name">
                Nama Situs:
                <input class="form-control" type="text" name="site_name" id="site_name"
                    value="{{ old('site_name') ?? $settings[0]['value'] }}">
            </label>
            <label class="label-flex" for="site_description">
                Deskripsi Situs:
                <textarea class="form-control" name="site_description" id="site_description" rows="5">{{ old('site_description') ?? $settings[1]['value'] }}</textarea>
                <p class="text-xs text-black">Jumlah karakter: <span id="char_sum">0</span> (Pastikan tidak lebih dari 255
                    karakter)</p>
            </label>
            <button class="p-1.5 bg-blue-300 block w-full rounded-lg text-white font-bold text-sm mt-5" type="submit"><i
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

        descriptionInput.addEventListener('keyup', function () {
          countCharacters(this.value)
        })
    </script>
@endsection
