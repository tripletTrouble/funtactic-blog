@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title mb-0">Pengaturan Menu Utama</p>
        <p class="text-xs xl:text-sm text-center text-sky-500 mb-5">(Pastikan menu tidak terduplikasi)</p>
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
        <form action="{{ url('settings') }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-col">
                <label class="form-label" for="menu_1">Menu 1:</label>
                <select class="form-control" name="menu_1" id="menu_1">
                    <option selected disabled> -- Pilih Menu 1 -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"
                            @if (Settings::hasMenu() && isset($menus[0]->id)) {{ $category['id'] == $menus[0]->id ? 'selected' : '' }} @endif>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-col">
                <label class="form-label" for="menu_2">Menu 2:</label>
                <select class="form-control" name="menu_2" id="menu_2">
                    <option selected disabled> -- Pilih Menu 2 -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"
                            @if (Settings::hasMenu() && isset($menus[1]->id)) {{ $category['id'] == $menus[1]->id ? 'selected' : '' }} @endif>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-col">
                <label class="form-label" for="menu_3">Menu 3:</label>
                <select class="form-control" name="menu_3" id="menu_3">
                    <option selected disabled> -- Pilih Menu 3 -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"
                            @if (Settings::hasMenu() && isset($menus[2]->id)) {{ $category['id'] == $menus[2]->id ? ' selected' : '' }} @endif>
                            {{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn-primary w-full mt-5" type="submit"><i class="bi bi-arrow-repeat"></i> Update</button>
        </form>
        <form action="/settings/reset-menu" method="post">
            @csrf
            <button class="btn-warning mt-3 w-full" type="submit"><i class="bi bi-trash-fill"></i> Reset Menu</button>
        </form>
    </div>
@endsection
