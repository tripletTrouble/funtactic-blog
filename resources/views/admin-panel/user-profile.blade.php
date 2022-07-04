@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title mb-0">Profil Pemilik Blog</p>
        <p class="text-xs text-center text-sky-500 dark:sky-400 italic mb-5">Kami menghargai privasimu, kosongkan data yang
            tidak ingin kamu
            tunjukkan kepada publik.</p>
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
        <form action="{{ url('user/profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset class="p-3" id="personal-profile">
                <legend
                    class="font-bold text-base lg:text-lg text-sky-500 dark:text-sky-400 pb-1 border-b border-sky-500 w-full">
                    Tentang Diri</legend>
                <div class="form-col">
                    <label class="form-label" for="first_name">Nama Depan:</label>
                    <input class="form-control" type="text" name=" first_name" id="first_name" placeholder="John"
                        value="{{ old('first_name') ?? ($profiles->first_name ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="last_name">Nama Belakang:</label>
                    <input class="form-control" type="text" name=" last_name" id="last_name" placeholder="Doe"
                        value="{{ old('last_name') ?? ($profiles->last_name ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="profile_photo">Foto Profile:</label>
                    <input class="form-control" type="file" name=" profile_photo" id="profile_photo"
                        onchange="loadFile(event)">
                    <p class="text-xs italic dark:text-white">Ukuran maks. 520 x 520 px (persegi) dan tidak lebih dari 400kb.</p>
                    <img class="w-24 h-24 text-center border rounded-full" id="preview-image"
                        src="{{ $profiles->profile_photo_url ?? '' }}" alt="Photo">
                    <p></p>
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
                    <label class="form-label" for="born">Tanggal Lahir:</label>
                    <input class="form-control" type="date" name="born" id="born"
                        value="{{ old('born') ?? ($profiles->born ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="address">Alamat:</label>
                    <input class="form-control" type="text" name="address" id="address"
                        placeholder="Jalan Santai No. 32, Surakarta"
                        value="{{ old('address') ?? ($profiles->address ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="interest">Ketertarikan (minat):</label>
                    <input class="form-control" type="text" name="interest" id="interest"
                        placeholder="teaching, parenting, mancing"
                        value="{{ old('interest') ?? ($profiles->interest ?? '') }}">
                    <p class="text-xs italic text-black dark:text-white">Pisahkan dengan tanda koma(,)</p>
                </div>
                <div class="form-col">
                    <label class="form-label" for="bio">Bio:</label>
                    <textarea class="form-control" name="bio" id="bio" rows="5"
                        placeholder="Tulis sesuatu tentang dirimu ...">{{ old('bio') ?? ($profiles->bio ?? '') }}</textarea>
                    <p class="text-xs italic text-black dark:text-white">Jumlah karakter: <span id="char">0</span> Pastikan tidak lebih
                        dari
                        255 karakter.</p>
                    <script>
                        var bio = document.getElementById("bio")

                        var updateChar = function() {
                                var char = document.getElementById("char")

                                char.textContent = bio.value.length
                            }
                        
                        updateChar();

                        bio.addEventListener("keyup", updateChar)
                    </script>
                </div>
            </fieldset>
            <fieldset class="p-3" id="personal-profile">
                <legend
                    class="font-bold text-base lg:text-lg text-sky-500 dark:text-sky-400 pb-1 border-b border-sky-500 w-full">
                    Profile Media Sosial</legend>
                <div class="form-col">
                    <label class="form-label" for="twitter">Twitter:</label>
                    <input class="form-control" type="text" name=" twitter" id="twitter"
                        placeholder="https://twitter.com/john_doe"
                        value="{{ old('twitter') ?? ($profiles->twitter ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="instagram">Instagram:</label>
                    <input class="form-control" type="text" name=" instagram" id="instagram"
                        placeholder="https://instagram.com/john_doe"
                        value="{{ old('instagram') ?? ($profiles->instagram ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="facebook">Facebook:</label>
                    <input class="form-control" type="text" name="facebook" id="facebook"
                        placeholder="https://facebook.com/john_doe"
                        value="{{ old('facebook') ?? ($profiles->facebook ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="tiktok">TikTok</label>
                    <input class="form-control" type="text" name="tiktok" id="tiktok"
                        placeholder="https://tiktok.com/@john_doe"
                        value="{{ old('tiktok') ?? ($profiles->tiktok ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="youtube">YouTube:</label>
                    <input class="form-control" type="text" name="youtube" id="youtube"
                        placeholder="https://youtube.com/channel/AxzlkKmLvvN123bbN"
                        value="{{ old('youtube') ?? ($profiles->youtube ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="linkedin">LinkedIn:</label>
                    <input class="form-control" type="text" name="linkedin" id="linkedin"
                        placeholder="https://linkedin.com/in/john-doe-123as456"
                        value="{{ old('linkedin') ?? ($profiles->linkedin ?? '') }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="github">GitHub:</label>
                    <input class="form-control" type="text" name="github" id="github"
                        placeholder="https://github.com/john_doe"
                        value="{{ old('github') ?? ($profiles->github ?? '') }}">
                </div>
            </fieldset>
            <button class="btn-primary w-full"><i class="bi bi-arrow-repeat"></i> Update Profile</button>
        </form>
    </div>
@endsection
