@extends('layouts.admin-panel')

@section('content')
    <div class="w-11/12 mx-auto mb-7">
        <p class="text-xl font-bold text-center text-blue-300 mb-5">Daftar Artikelmu</p>
        @if (session('success'))
            <div class="border p-5 border-blue-400 rounded-lg mb-5">
                <p class="text-blue-400 text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <table class="table-auto text-sm">
          <thead>
            <tr>
              <th class="text-white bg-blue-300 p-2">#</th>
              <th class="text-white bg-blue-300 p-2">Judul Artikel</th>
              <th class="text-white bg-blue-300 p-2">Kategori</th>
              <th class="text-white bg-blue-300 p-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $article)
                <tr class="border-b border-blue-300">
                  <td class="p-2">{{ $loop->iteration }}</td>
                  <td class="p-2">{{ $article['title'] }}</td>
                  <td class="p-2">{{ $article->category['name'] }}</td>
                  <td class="p-2 w-max">
                    <div class="flex flex-col items-center my-auto">
                      <a class="p-1 bg-yellow-300 text-white rounded-lg mb-2 flex" href="{{ url('/edit-article?id=' . $article['id']) }}"><i class="bi bi-pencil mr-1"></i> Ubah</a>
                      <form action="{{ url('/articles') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $article['id'] }}">
                        <button class="text-white bg-red-400 p-1 rounded-lg flex" type="submit"><i class="bi bi-trash mr-1"></i> Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>

@endsection
