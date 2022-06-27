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
                    <th class="lg:w-2/5">Judul Artikel</th>
                    <th>Kategori</th>
                    <th class="lg:w-2/5">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $key => $article)
                    <tr>
                        <td class="text-center">{{ $articles->firstItem() + $key }}</td>
                        <td class="truncate">{{ $article['title'] }}</td>
                        <td>{{ $article->category['name'] }}</td>
                        <td>
                            <div class="btn-wrapper">
                                <a class="btn-info" href="{{ url('articles/' . $article['uuid'] . '/edit') }}"><i
                                        class="bi bi-pencil mr-1"></i> Ubah</a>
                                <form action="{{ url('articles/' . $article['uuid']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger" type="submit"><i class="bi bi-trash mr-1"></i>
                                        Hapus</button>
                                </form>
                                @if ($article['is_published'])
                                    <form action="{{ url('articles/' . $article['uuid'] . '/unpublish') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn-warning" type="submit"><i
                                                class="bi bi-exclamation-triangle-fill mr-1"></i> Unpublish</button>
                                    </form>
                                @else
                                    <form action="{{ url('articles/' . $article['uuid'] . '/publish') }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn-primary" type="submit"><i
                                                class="bi bi-exclamation-triangle-fill mr-1"></i> Publish</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
