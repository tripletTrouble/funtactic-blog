@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title">Daftar Artikelmu</p>
        @if (session('success'))
            <div class="alert-success">
                <p class="alert-title">{{ session('success') }}</p>
            </div>
        @endif
        <table class="table fw-table stripped-table">
          <thead class="table-head">
            <tr>
              <th class="w-10">#</th>
              <th>Judul Artikel</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $article)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $article['title'] }}</td>
                  <td>{{ $article->category['name'] }}</td>
                  <td>
                    <div class="btn-wrapper">
                      <a class="btn-info" href="{{ url('/edit-article?id=' . $article['id']) }}"><i class="bi bi-pencil mr-1"></i> Ubah</a>
                      <form action="{{ url('/articles') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $article['id'] }}">
                        <button class="btn-danger" type="submit"><i class="bi bi-trash mr-1"></i> Hapus</button>
                      </form>
                      <form action="{{ url('/articles') }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $article['id'] }}">
                        <button class="btn-warning" type="submit"><i class="bi bi-exclamation-triangle-fill mr-1"></i> Hapus</button>
                      </form>
                    </div>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </div>

@endsection
