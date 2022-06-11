@extends('layouts.front-page')

@section('content')
    <main class="px-3">
        <p class="text-blue-600 mb-7 text-center font-bold text-lg px-3 pb-1 border-b border-blue-600 w-fit mx-auto">Artikel
            Terbaru</p>
        @foreach ($articles as $article)
            <div class="article-wrapper mb-3 border-b pb-3">
                <img class="rounded-xl border-2 border-slate-200" src="{{ $article['thumbnail_url'] }}"
                    alt="{{ $article['title'] }}">
                <h2 class="article-title font-bold mt-2 text-lg">{{ $article['title'] }}</h2>
                <p class="article-info text-xs mt-2">Oleh: {{ $owner['full_name'] }} pada:
                    {{ date('d F Y', strtotime($article['created_at'])) }}</p>
                <p class="excerpt mt-3">{{ $article['excerpt'] }}</p>
                <a class="p-1 block w-fit mx-auto border border-blue-600 rounded-md text-blue-600 mt-3 text-sm hover:bg-blue-600 hover:text-white"
                    href="{{ url('articles?id=') . $article['id'] }}">Lanjut Baca</a>
            </div>
        @endforeach
    </main>
@endsection
