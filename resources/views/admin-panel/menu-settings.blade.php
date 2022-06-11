@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="text-xl font-bold text-center text-blue-300 mb-2">Pengaturan Menu Utama</p>
        <p class="text-xs text-center text-blue-300 mb-5">(Pastikan menu tidak terduplikasi)</p>
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
            <label class="label-flex" for="menu_1">
                Menu 1:
                <select class="form-control" name="menu_1" id="menu_1">
                    <option selected disabled> -- Pilih Menu 1 -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($settings[0]['value'] == $category['id'])>{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <label class="label-flex" for="menu_2">
                Menu 2:
                <select class="form-control" name="menu_2" id="menu_2">
                    <option selected disabled> -- Pilih Menu 2 -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($settings[1]['value'] == $category['id'])>{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <label class="label-flex" for="menu_3">
                Menu 3:
                <select class="form-control" name="menu_3" id="menu_3">
                    <option selected disabled> -- Pilih Menu 3 -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($settings[2]['value'] == $category['id'])>{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <label class="label-flex" for="menu_4">
                Menu 4:
                <select class="form-control" name="menu_4" id="menu_4">
                    <option selected disabled> -- Pilih Menu 4 -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" @selected($settings[3]['value'] == $category['id'])>{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <button class="bloc p-1.5 bg-blue-300 text-white w-full rounded-lg text-sm font-bold mt-5" type="submit"><i class="bi bi-arrow-repeat"></i> Update</button>
        </form>
    </div>
@endsection
