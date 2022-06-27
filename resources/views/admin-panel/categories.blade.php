@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title">Daftar Kategori</p>
        @if ($errors->any())
            <div class="alert-error">
                <p class="alert-title">Data gagal disimpan! </p>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert-success">
                <p class="alert-title">{{ session('success') }}</p>
            </div>
        @endif
        <button class="btn-primary mb-5" onclick="showCreateForm()"><i class="bi bi-plus-lg"></i> Tambah Kategori</button>
        <table class="table fw-table stripped-table">
            <thead class="table-head">
                <tr>
                    <th class="w-10 text-center">#</th>
                    <th>Nama Kategori</th>
                    <th class="w-2/5">Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['description'] }}</td>
                        <td>
                            @if ($category['id'] !== 1)
                                <div class="btn-wrapper">
                                    <button class="btn-info" onclick="showEditForm('{{ $category['uuid'] }}')"><i
                                            class="bi bi-pencil mr-1"></i>
                                        Ubah</button>
                                    <form class="delete-form" action="{{ url('categories/' . $category['uuid']) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-danger" type="submit"><i class="bi bi-trash-fill"></i>
                                            Hapus</button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal" id="edit-form">
            <div class="modal-card">
                <p class="menu-title">Edit Kategori</p>
                <form action="{{ url('categories/' . $category['uuid']) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-col">
                        <label class="form-label" for="input-edit-name">Nama kategori:</label>
                        <input class="form-control" type="text" name="name" id="input-edit-name" value="">
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="input-edit-description">Deskripsi kategori:</label>
                        <textarea class="form-control" name="description" id="input-edit-description" rows="5"></textarea>
                    </div>
                    <div class="flex justify-center gap-3">
                        <button class="btn-primary" type="submit"><i class="bi bi-send-fill"></i> Simpan Data</button>
                        <span class="btn-danger" onclick="closeEditForm()"><i class="bi bi-x-lg"></i> Cancel</span>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal" id="create-form">
            <div class="modal-card">
                <p class="menu-title">Buat Kategori Baru</p>
                <form action="{{ url('categories') }}" method="post">
                    @csrf
                    <div class="form-col">
                        <label class="form-label" for="input-post-name">Nama kategori:</label>
                        <input class="form-control" type="text" name="name" id="input-post-name" value="">
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="input-post-description">Deskripsi kategori:</label>
                        <textarea class="form-control" name="description" id="input-post-description" rows="5"></textarea>
                    </div>
                    <div class="flex justify-center gap-3">
                        <button class="btn-primary" type="submit"><i class="bi bi-send-fill"></i> Simpan Data</button>
                        <span class="btn-danger" onclick="closeCreateForm()"><i class="bi bi-x-lg"></i> Cancel</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Script for edititng category
        function getCategory(uuid) {
            axios.get('/api/categories?uuid=' + uuid)
                .then(function(response) {
                    deployEditForm(response.data)
                })
                .catch(function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        timer: 1500
                    })
                })
        }

        function deployEditForm(data) {
            var inputEditName = document.getElementById('input-edit-name')
            var inputEditDescription = document.getElementById('input-edit-description')
            var editForm = document.getElementById('edit-form')

            inputEditName.value = data['name']
            inputEditDescription.value = data['description']
            editForm.style.display = 'flex'
        }

        function showEditForm(uuid) {
            getCategory(uuid)
        }

        function closeEditForm() {
            var editForm = document.getElementById('edit-form')
            editForm.style.display = 'none'
        }

        function showCreateForm() {
            var createForm = document.getElementById('create-form')
            createForm.style.display = 'flex'
        }

        function closeCreateForm() {
            var createForm = document.getElementById('create-form')
            createForm.style.display = 'none'
        }

        // Script for deleting category
        var deleteForms = document.getElementsByClassName('delete-form')

        for (var i = 0; i < deleteForms.length; i++) {
            deleteForms[i].addEventListener('submit', function(event) {
                event.preventDefault()
                var form = event.target
                Swal.fire({
                    title: 'Menghapus Kategori',
                    text: "Apakah kamu yakin untuk menghapus kategori ini?",
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
