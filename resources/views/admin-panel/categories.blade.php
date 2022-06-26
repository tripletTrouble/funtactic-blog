@extends('layouts.admin-panel')

@section('content')
    <div class="dashboard-content">
        <p class="menu-title">Daftar Kategori</p>
        @if ($errors->any())
            <div class="border p-5 border-red-400 h-24 overflow-y-scroll rounded-lg mb-5">
                <p class="text-red-400 mb-2 font-bold text-sm">Data gagal disimpan! </p>
                <ul class="list-disc mx-3 text-red-400 text-sm">
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
                    <th class="w-10">#</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['description'] }}</td>
                        <td>
                            <div class="btn-wrapper">
                                <button class="btn-info" onclick="showEditForm({{ $category['id'] }})"><i
                                        class="bi bi-pencil mr-1"></i>
                                    Ubah</button>
                                <button class="btn-danger"
                                    onclick="confirmDelete({{ $category['id'] }}, '{{ $category['name'] }}')"><i
                                        class="bi bi-trash mr-1"></i>Hapus</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal" id="edit-form">
            <div class="modal-card">
                <p class="menu-title">Edit Kategori</p>
                <form action="{{ url('categories') }}" method="post">
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
        function getCategoryById(id) {
            axios.get('/api/categories?id=' + id)
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

        function showEditForm(id) {
            getCategoryById(id)
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

        function confirmDelete(categoryId, categoryName) {
            Swal.fire({
                title: 'Menghapus Kategori',
                text: `Apakah kamu yakin akan menghapus kategori ${categoryName} ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#22c55e',
                cancelButtonColor: '#dc2626',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteCategory(categoryId)
                }
            })
        }

        function deleteCategory(categoryId) {
            axios.delete('/categories', {
                    params: {
                        'id': categoryId,
                    }
                })
                .then(function(response) {
                    window.location.reload();
                })
                .catch(function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops ...',
                        text: 'Terjadi kesalahan server!',
                        timer: 1500
                    })
                })
        }
    </script>
@endsection
