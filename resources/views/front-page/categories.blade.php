@extends('layouts.front-page')

@section('content')
    <div class="mx-3 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl md:mx-auto mb-12">
        <p
            class="text-sky-500 dark:text-sky-400 mb-7 text-center font-bold text-lg lg:text-xl xl:text-2xl px-3 pb-1 border-b border-sky-500 dark:border-sky-400 w-fit mx-auto">
            Semua Kategori</p>
        <div class="flex flex-col dark:text-white">
            @foreach ($categories as $category)
                <a class="hover:bg-gray-600 hover:bg-opacity-50" href="{{ url('articles/categories/' . $category->slug) }}">
                    <div class="px-5 py-7">
                        <h2
                            class="text-lg md:text-xl xl:text-2xl font-bold text-sky-500 dark:text-sky-400 mb-2">
                            {{ $category->name }}</h2>
                        <p class="text-sm md:text-base 2xl:text-lg mb-3">{{ $category->description }}</p>
                        <p class="text-sm md:text-base 2xl:text-lg font-bold">Jumlah artikel:
                            {{ $category->articles->count() }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
