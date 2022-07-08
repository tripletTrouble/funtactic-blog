@extends('layouts.front-page')

@section('content')
    <div class="mx-3 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl md:mx-auto mb-12">
        <div class="flex items-center justify-center min-h-screen mx-5" id="profile-container">
            <div class="bg-slate-100 p-5 rounded-lg dark:bg-slate-800 flex flex-col items-center">
                <h1
                    class="text-sky-500 dark:text-sky-400 mb-7 text-center font-bold text-2xl px-3 pb-1 border-b border-sky-500 dark:border-sky-400 w-fit mx-auto">
                    Tentang Saya</h1>
                <img class="rounded-full w-44 h-44 text-center border"
                    src="{{ Users::owner()->profile->profile_photo_url }}"
                    alt="{{ isset(Users::owner()->profile->profile_photo_url) ? Users::owner()->profile->full_name : 'Photo' }}">
                <p class="text-xl text-sky-500 dark:text-sky-400 font-bold mt-7">
                    {{ Users::owner()->profile->full_name !== ' ' ? Users::owner()->profile->full_name : Users::owner()->name }}
                </p>
                @isset(Users::owner()->profile->born)
                    <p class="dark:text-white mt-5 text-sm">
                        <i class="bi bi-balloon-fill"></i>
                        {{ Users::owner()->profile->born->isoFormat('D MMMM Y') }}
                    </p>
                @endisset
                <p class="dark:text-white text-sm text-center">
                    <i class="bi bi-geo-alt-fill"></i>
                    {{ Users::owner()->profile->address ?? '' }}
                </p>
                <div class="dark:text-white mt-3 text-sm">
                    <p
                        class="text-sky-500 dark:text-sky-400 border-b border-sky-400 w-fit px-5 mx-auto font-bold text-base mb-2">
                        Bio:</p>
                    <p class="italic text-center">{{ Users::owner()->profile->bio }}</p>
                </div>
                <div class="dark:text-white mt-3 text-sm">
                    <p
                        class="text-sky-500 dark:text-sky-400 border-b border-sky-400 w-fit px-5 mx-auto font-bold text-base mb-2">
                        Interest:</p>
                    <div class="flex gap-2 flex-wrap justify-center">
                        @if (isset(Users::owner()->profile->interest))
                            @foreach (explode(',', Users::owner()->profile->interest) as $item)
                                <span
                                    class="py-1 px-2 bg-sky-400 rounded-lg text-xs font-semibold">{{ $item }}</span>
                            @endforeach
                        @else
                            <p>-</p>
                        @endif
                    </div>
                </div>
                <div class="dark:text-white text-sm mt-7">
                    <p
                        class="text-sky-500 dark:text-sky-400 border-b border-sky-400 w-fit px-5 mx-auto font-bold text-base mb-2">
                        Media Sosial:</p>
                    <div class="flex gap-3 flex-col mt-5">
                        @isset(Users::owner()->profile->twitter)
                            <a class="flex gap-2 hover:text-sky-500" href="{{ Users::owner()->profile->twitter }}"><i class="bi bi-twitter"></i>
                                {{ Users::owner()->profile->twitter }}</a>
                        @endisset
                        @isset(Users::owner()->profile->facebook)
                            <a class="flex gap-2 hover:text-sky-500" href="{{ Users::owner()->profile->facebook }}"><i
                                    class="bi bi-facebook"></i>
                                {{ Users::owner()->profile->facebook }}</a>
                        @endisset
                        @isset(Users::owner()->profile->instagram)
                            <a class="flex gap-2 hover:text-sky-500" href="{{ Users::owner()->profile->instagram }}"><i
                                    class="bi bi-instagram"></i>
                                {{ Users::owner()->profile->instagram }}</a>
                        @endisset
                        @isset(Users::owner()->profile->tiktok)
                            <a class="flex gap-2 hover:text-sky-500" href="{{ Users::owner()->profile->tiktok }}"><i class="bi bi-tiktok"></i>
                                {{ Users::owner()->profile->tiktok }}</a>
                        @endisset
                        @isset(Users::owner()->profile->youtube)
                            <a class="flex gap-2 hover:text-sky-500" href="{{ Users::owner()->profile->youtube }}"><i class="bi bi-youtube"></i>
                                {{ Users::owner()->profile->youtube }}</a>
                        @endisset
                        @isset(Users::owner()->profile->linkedin)
                            <a class="flex gap-2 hover:text-sky-500" href="{{ Users::owner()->profile->linkedin }}"><i
                                    class="bi bi-linkedin"></i>
                                {{ Users::owner()->profile->linkedin }}</a>
                        @endisset
                        @isset(Users::owner()->profile->twitter)
                            <a class="flex gap-2 hover:text-sky-500" href="{{ Users::owner()->profile->github }}"><i class="bi bi-github"></i>
                                {{ Users::owner()->profile->github }}</a>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
