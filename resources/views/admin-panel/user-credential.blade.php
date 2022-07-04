@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title">Pengaturan Identitas Situs</p>
        @if ($errors->updatePassword->any())
            <div class="alert-error">
                <p class="alert-title">Data gagal disimpan! </p>
                <ul class="error-list">
                    @foreach ($errors->updatePassword->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($errors->updateProfileInformation->any())
            <div class="alert-error">
                <p class="alert-title">Data gagal disimpan! </p>
                <ul class="error-list">
                    @foreach ($errors->updateProfileInformation->all() as $error)
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
        <hr class="mx-10">
        <div class="flex mt-3 mb-7 gap-5">
            <button class="nav-pill active" onclick="showForm(this, 'info')"><i class="bi bi-card-list"></i> User
                Info</button>
            <button class="nav-pill" onclick="showForm(this, 'password')"><i class="bi bi-shield-lock-fill"></i>
                Password</button>
        </div>
        <div class="block" id="info">
            <p
                class="text-base lg:text-lg text-sky-500 dark:text-sky-400 font-bold pb-2 border-b border-sky-400 mb-5 w-fit">
                Ubah Informasi Pengguna</p>
            <form action="{{ url('user/profile-information') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-col">
                    <label class="form-label" for="name">Username:</label>
                    <input class="form-control" type="text" name="name" id="name"
                        value="{{ old('name') ?? Auth::user()->name }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" name="email" id="email"
                        value="{{ old('email') ?? Auth::user()->email }}">
                </div>
                <button class="btn-primary w-full" type="submit"><i class="bi bi-arrow-repeat"></i> Update</button>
            </form>
        </div>
        <div class="hidden" id="password">
            <p
                class="text-base lg:text-lg text-sky-500 dark:text-sky-400 font-bold pb-2 border-b border-sky-400 mb-5 w-fit">
                Ubah Password</p>
            <form action="{{ url('user/password') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-col">
                    <label class="form-label" for="current_password">Password Saat Ini:</label>
                    <input class="form-control" type="password" name="current_password" id="current_password">
                </div>
                <div class="form-col">
                    <label class="form-label" for="password">Password Baru:</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-col">
                    <label class="form-label" for="password_confirmation">Konfirmasi Password:</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <button class="btn-primary w-full" type="submit"><i class="bi bi-arrow-repeat"></i> Update</button>
            </form>
        </div>
    </div>

    <script>
        var showForm = function(button, target) {
            var infoForm = document.getElementById('info'),
                passwordForm = document.getElementById('password')

            button.classList.add('active')
            if (button.previousElementSibling) {
                button.previousElementSibling.classList.remove('active')
            } else {
                button.nextElementSibling.classList.remove('active')
            }

            if (target === 'info') {
                infoForm.classList.replace('hidden', 'block')
                passwordForm.classList.replace('block', 'hidden')
            } else {
                infoForm.classList.replace('block', 'hidden')
                passwordForm.classList.replace('hidden', 'block')
            }
        }
    </script>
@endsection
