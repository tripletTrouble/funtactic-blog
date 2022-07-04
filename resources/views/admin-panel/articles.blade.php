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
                    <th class="md:w-1/3">Judul Artikel</th>
                    <th>Kategori</th>
                    <th class="md:w-2/5">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $key => $article)
                    <tr>
                        <td class="text-center">{{ $articles->firstItem() + $key }}</td>
                        <td class="truncate">{{ $article['title'] }}</td>
                        <td class="truncate">{{ $article->category['name'] }}</td>
                        <td>
                            <div class="btn-wrapper">
                                <a class="btn-info w-full md:w-fit py-1"
                                    href="{{ url('articles/' . $article['uuid'] . '/edit') }}"><i
                                        class="bi bi-pencil mr-1"></i> Ubah</a>
                                <form class="delete-form" action="{{ url('articles/' . $article['uuid']) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger w-full md:w-fit py-1" type="submit"><i
                                            class="bi bi-trash mr-1"></i>
                                        Hapus</button>
                                </form>
                                @if ($article['is_published'])
                                    <form action="{{ url('articles/' . $article['uuid']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="published" value="0">
                                        <button class="btn-warning w-full md:w-fit py-1" type="submit"><i
                                                class="bi bi-exclamation-triangle-fill mr-1"></i>
                                            Unpublish</button>
                                    </form>
                                @else
                                    <form action="{{ url('articles/' . $article['uuid']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="published" value="1">
                                        <button class="btn-primary w-full md:w-fit py-1" type="submit"><i
                                                class="bi bi-eye-fill mr-1"></i>
                                            Publish</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-7">
            {{ $articles->links('pagination.simple-pagination') }}
        </div>
    </div>
    <script>
        var deleteForms = document.getElementsByClassName('delete-form')

        for (var i = 0; i < deleteForms.length; i++) {
            deleteForms[i].addEventListener('submit', function(event) {
                event.preventDefault()
                var form = event.target
                Swal.fire({
                    title: 'Menghapus Artikel',
                    text: "Apakah kamu yakin untuk menghapus artikel ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            })
        }
    </script>
@endsection
