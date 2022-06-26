@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title mb-0">Profil Pemilik Blog</p>
        <p class="text-xs text-center text-rose-600 dark:rose-500 italic mb-5">Kami menghargai privasimu, kosongkan data yang
            tidak ingin kamu
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
        <form action="{{ url('/user-profiles') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="p-3" id="personal-profile">
                <legend
                    class="font-bold text-base lg:text-lg text-rose-600 dark:text-rose-500 pb-1 border-b border-rose-600 w-full">
                    Tentang Diri</legend>
                <div class="form-col">
                    <label class="form-label" for="first_name">Nama Depan:</label>
                    <input class="form-control" type="text" name=" first_name" id="first_name" placeholder="John"
                        value="{{ old('first_name') ?? $personalProfile->first_name }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="last_name">Foto Profile:</label>
                    <input class="form-control" type="text" name=" last_name" id="last_name" placeholder="Doe"
                        value="{{ old('last_name') ?? $personalProfile->last_name }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="profile_photo">Nama Belakang:</label>
                    <input class="form-control" type="file" name=" profile_photo" id="profile_photo">
                </div>
                <div class="form-col">
                    <label class="form-label" for="born">Tanggal Lahir:</label>
                    <input class="form-control" type="date" name="born" id="born"
                        value="{{ old('born') ?? $personalProfile->born }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="address">Alamat:</label>
                    <input class="form-control" type="text" name="address" id="address"
                        placeholder="Jalan Santai No. 32, Surakarta"
                        value="{{ old('address') ?? $personalProfile->address }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="interest">Ketertarikan (minat):</label>
                    <input class="form-control" type="text" name="interest" id="interest"
                        placeholder="teaching, parenting, mancing"
                        value="{{ old('interest') ?? $personalProfile->interest }}">
                    <p class="text-xs italic text-black">Pisahkan dengan tanda koma(,)</p>
                </div>
                <div class="form-col">
                    <label class="form-label" for="bio">Bio:</label>
                    <textarea class="form-control" name="bio" id="bio" rows="5"
                        placeholder="Tulis sesuatu tentang dirimu ...">{{ old('bio') ?? $personalProfile->bio }}</textarea>
                    <p class="text-xs italic text-black">Jumlah karakter: <span id="char">0</span> Pastikan tidak lebih
                        dari
                        255 karakter.</p>
                </div>
            </fieldset>
            <fieldset class="p-3" id="personal-profile">
                <legend
                    class="font-bold text-base lg:text-lg text-rose-600 dark:text-rose-500 pb-1 border-b border-rose-600 w-full">
                    Profile Media Sosial</legend>
                <div class="form-col">
                    <label class="form-label" for="twitter">Twitter:</label>
                    <input class="form-control" type="text" name=" twitter" id="twitter"
                        placeholder="https://twitter.com/john_doe"
                        value="{{ old('twitter') ?? $socialMediaProfile->twitter }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="instagram">Instagram:</label>
                    <input class="form-control" type="text" name=" instagram" id="instagram"
                        placeholder="https://instagram.com/john_doe"
                        value="{{ old('instagram') ?? $socialMediaProfile->instagram }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="facebook">Facebook:</label>
                    <input class="form-control" type="text" name="facebook" id="facebook"
                        placeholder="https://www.facebook.com/john_doe"
                        value="{{ old('facebook') ?? $socialMediaProfile->facebook }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="tiktok">TikTok</label>
                    <input class="form-control" type="text" name="tiktok" id="tiktok"
                        placeholder="https://www.tiktok.com/@john_doe"
                        value="{{ old('tiktok') ?? $socialMediaProfile->tiktok }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="youtube">YouTube:</label>
                    <input class="form-control" type="text" name="youtube" id="youtube"
                        placeholder="https://www.youtube.com/channel/AxzlkKmLvvN123bbN"
                        value="{{ old('youtube') ?? $socialMediaProfile->youtube }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="linkedin">LinkedIn:</label>
                    <input class="form-control" type="text" name="linkedin" id="linkedin"
                        placeholder="https://www.linkedin.com/in/john-doe-123as456"
                        value="{{ old('linkedin') ?? $socialMediaProfile->linkedin }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="github">GitHub:</label>
                    <input class="form-control" type="text" name="github" id="github"
                        placeholder="https://www.github.com/john_doe"
                        value="{{ old('github') ?? $socialMediaProfile->github }}">
                </div>
            </fieldset>
            <button class="btn-primary w-full"><i
                    class="bi bi-arrow-repeat"></i> Update Profile</button>
        </form>
    </div>
@endsection
