@extends('layouts.front-page')

@section('content')
    <div class="mx-3 md:max-w-screen-sm lg:max-w-screen-md xl:max-w-screen-lg 2xl:max-w-screen-xl md:mx-auto mb-12">
        <h1
            class="text-sky-500 dark:text-sky-400 text-center font-bold text-lg lg:text-xl xl:text-2xl px-3 pb-1 border-b border-sky-500 dark:border-sky-400 w-fit mx-auto">
            Pencarian Artikel</h1>
        <p class="text-center dark:text-white text-xs lg:text-sm mt-3 mb-7">Hasil pencarian artikel dengan kata kunci: <em>{{ request('keywords') }}</em></p>
        <div class="article-container" id="article-container">
            @foreach ($articles as $article)
                <a class="article-link" href="{{ url('articles/' . $article['slug']) }}">
                    <div class="article">
                        <img class="article-image" src="{{ $article['thumbnail_url'] }}" alt="{{ $article['title'] }}">
                        <h2 class="article-title">{{ $article['title'] }}</h2>
                        <p class="article-info">{{ $article->user->profile->full_name }} &bull;
                            {{ $article->creation_date }}</p>
                        <p class="article-excerpt">{{ $article['excerpt'] }}</p>
                        <span class="article-category">{{ $article->category->name }}</span>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-7 flex justify-center">
            {{ $articles->withQueryString()->links('pagination.article-default') }}
        </div>
    </div>
@endsection
