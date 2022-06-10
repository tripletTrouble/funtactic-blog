@extends('layouts.admin-panel')

@section('content')
    <div class="w-11/12 mx-auto mb-7">
        <p class="text-xl font-bold text-center text-blue-300 mb-2">Buat Profile</p>
        <p class="text-xs text-center text-black italic mb-5">Kami menghargai privasimu, kosongkan data yang tidak ingin kamu
            tunjukkan kepada publik.</p>
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
        <form action="{{ url('/user-profiles') }}" method="post">
            @csrf
            @method('PUT')
            <p class="font-bold text-sm text-blue-300 pb-1 border-b border-blue-300">Tentang Diri</p>
            <div class="p-3" id="personal-profile">
                <label class="label-flex" for="first_name">
                    Nama Depan:
                    <input class="form-control" type="text" name=" first_name" id="first_name" placeholder="John">
                </label>
                <label class="label-flex" for="last_name">
                    Nama Belakang:
                    <input class="form-control" type="text" name=" last_name" id="last_name" placeholder="Doe">
                </label>
                <label class="label-flex" for="born">
                    Tanggal Lahir:
                    <input class="form-control" type="date" name="born" id="born">
                </label>
                <label class="label-flex" for="address">
                    Alamat:
                    <input class="form-control" type="text" name="address" id="address"
                        placeholder="Jalan Santai No. 32, Surakarta">
                </label>
                <label class="label-flex" for="interest">
                    Ketertarikan (minat):
                    <input class="form-control" type="text" name="interest" id="interest"
                        placeholder="teaching, parenting, mancing">
                    <p class="text-xs italic text-black">Pisahkan dengan tanda koma(,)</p>
                </label>
                <label class="label-flex" for="bio">
                    Bio:
                    <textarea class="form-control" name="bio" id="bio" rows="5" placeholder="Tulis sesuatu tentang dirimu ..."></textarea>
                    <p class="text-xs italic text-black">Jumlah karakter: <span id="char">0</span> Pastikan tidak lebih dari
                        255 karakter.</p>
                </label>
            </div>
            <p class="font-bold text-sm text-blue-300 pb-1 border-b border-blue-300">Profile Media Sosial</p>
            <div class="p-3" id="personal-profile">
                <label class="label-flex" for="twitter">
                    Twitter:
                    <input class="form-control" type="text" name=" twitter" id="twitter" placeholder="https://twitter.com/john_doe">
                </label>
                <label class="label-flex" for="instagram">
                    Instagram:
                    <input class="form-control" type="text" name=" instagram" id="instagram" placeholder="https://instagram.com/john_doe">
                </label>
                <label class="label-flex" for="facebook">
                    Facebook:
                    <input class="form-control" type="text" name="facebook" id="facebook" placeholder="https://www.facebook.com/john_doe">
                </label>
                <label class="label-flex" for="tiktok">
                    TikTok
                    <input class="form-control" type="text" name="tiktok" id="tiktok"
                        placeholder="https://www.tiktok.com/@john_doe">
                </label>
                <label class="label-flex" for="youtube">
                    YouTube:
                    <input class="form-control" type="text" name="youtube" id="youtube"
                        placeholder="https://www.youtube.com/channel/AxzlkKmLvvN123bbN">
                </label>
                <label class="label-flex" for="linkedin">
                    LinkedIn:
                    <input class="form-control" type="text" name="linkedin" id="linkedin"
                        placeholder="https://www.linkedin.com/in/john-doe-123as456">
                </label>
                <label class="label-flex" for="github">
                    GitHub:
                    <input class="form-control" type="text" name="github" id="github"
                        placeholder="https://www.github.com/john_doe">
                </label>
            </div>
            <button class="block p-1.5 bg-blue-300 text-white text-sm w-full rounded-lg font-bold"><i class="bi bi-arrow-repeat"></i> Update Profile</button>
        </form>
    </div>
@endsection
