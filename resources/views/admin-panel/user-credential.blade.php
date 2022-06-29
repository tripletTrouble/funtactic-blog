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
        <div id="credential">
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
                    <input type="email" name="email" id="email">
                </div>
                <button class="btn-primary w-full" type="submit"><i class="bi bi-arrow-repeat"></i> Update</button>
            </form>
        </div>
        <div id="password">
            <form action="{{ url('user/password') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-col">
                    <label class="form-label" for="name">New Password:</label>
                    <input class="form-control" type="text" name="name" id="name"
                        value="{{ old('name') ?? Auth::user()->name }}">
                </div>
                <div class="form-col">
                    <label class="form-label" for="email">Password Confirmation:</label>
                    <input type="email" name="email" id="email">
                </div>
                <button class="btn-primary w-full" type="submit"><i class="bi bi-arrow-repeat"></i> Update</button>
            </form>
        </div>
    </div>
@endsection
