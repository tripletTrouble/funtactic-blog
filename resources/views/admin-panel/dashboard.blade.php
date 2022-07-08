@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title">Halaman Dashboard</p>
        <p class="text-sm lg:text-base text-center dark:text-white">Selamat datang, ini adalah halaman dashboard. Kamu bisa
            memulai menulis artikel dengan melalui link yang terdapat pada panel menu.</p>
        <div class="p-3 mt-7 border rounded-lg">
            <p class="text-lg lg:text-xl font-bold text-sky-500 dark:text-sky-400 mb-3">Artikel</p>
            <p class="text-sm lg:text-base dark:text-white">
                Kamu memiliki {{ Articles::get()->count() }} artikel.
            </p>
            <ul class="list-disc pl-8 dark:text-white">
                <li>{{ Articles::published()->get()->count() }} artikel terbit</li>
                <li>{{ Articles::unpublished()->get()->count() }} artikel belum terbit.</li>
            </ul>
        </div>
        <div class="p-3 mt-7 border rounded-lg">
            <p class="text-lg lg:text-xl font-bold text-sky-500 dark:text-sky-400 mb-3">Kategori</p>
            <p class="text-sm lg:text-base dark:text-white">
                Kamu memiliki {{ Categories::get()->count() }} kategori.
            </p>
        </div>
    </div>
@endsection
