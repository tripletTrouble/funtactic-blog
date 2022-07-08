@extends('layouts.front-page')

@section('content')
    <div class="mx-3 md:max-w-screen-sm pt-5 lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl md:mx-auto mb-12">
        <p class="text-xs 2xl:text-sm text-sky-500 dark:text-sky-400 mb-3 truncate" id="breadcrumbs">Home > Articles >
            {{ $article->title }}</p>
        <article>
            <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}">
            <h1 class="text-center mt-5">{{ $article->title }}</h1>
            <a href="{{ url('/about-me') }}">
                <div class="flex items-center justify-center mt-5 gap-2">
                    <img class="w-7" src="{{ $article->user->profile->profile_photo_url }}" alt="{{ $article->title }}"
                        id="profile-photo">
                        <p class="text-xs lg:text-sm">Sumber: {!! $article->thumbnail_credit !!}</p>
                    <p class="text-sm 2xl:text-base font-semibold text-sky-500 dark:text-sky-400">
                        {{ $article->user->profile->full_name }}
                        &bull; <span class="text-black dark:text-white font-normal">{{ $article->creation_date }}</span>
                    </p>
                </div>
            </a>
            <section class="mt-7 px-3">
                {!! $article->parsed_body !!}
            </section>
            <p class="mt-7">Tags: <em>{{ $article->tags }}</em></p>
            <div class="mt-7" id="share-box">
                <p class="text-sm 2xl:text-base text-center">Merasa artikel ini bermanfaat? Jangan lupa bagikan ke temanmu,
                    ya!</p>
                <div class="flex gap-2 mt-3 w-fit mx-auto">
                    <a class="py-0.5 px-2 text-white bg-sky-400 rounded-full text-sm 2xl:text-base font-semibold"
                        href="{{ 'https://twitter.com/intent/tweet?text=' . $article->title . '&url=' . url()->full() }}"
                        target="_blank">
                        <i class="bi bi-twitter"></i> Tweet</a>
                    <a class="py-0.5 px-2 text-white bg-blue-600 rounded-full text-sm 2xl:text-base font-semibold"
                        href="{{ 'https://facebook.com/sharer.php?u=' . url()->full() }}" target="_blank">
                        <i class="bi bi-facebook"></i> Share</a>
                    <a class="py-0.5 px-2 text-white bg-emerald-500 rounded-full text-sm 2xl:text-base font-semibold"
                        href="{{ 'https://api.whatsapp.com/send?text=' . $article->title . '%20' . url()->full() }}"
                        target="_blank">
                        <i class="bi bi-whatsapp"></i> Share</a>
                </div>
            </div>
        </article>
    </div>
@endsection
