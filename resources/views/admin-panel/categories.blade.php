@extends('layouts.admin-panel')

@section('content')
    <main class="w-11/12 mx-auto mb-7">
        <p class="text-xl font-bold text-center text-blue-300 mb-5">Daftar Kategori</p>
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
            <div class="border p-5 border-blue-400 rounded-lg mb-5">
                <p class="text-blue-400 text-sm">{{ session('success') }}</p>
            </div>
        @endif
        <button class="bg-emerald-300 text-white py-1.5 px-2 rounded-lg font-semibold text-sm mb-5"
            onclick="showCreateForm()"><i class="bi bi-plus-lg"></i> Tambah Kategori</button>
        <table class="table-auto text-sm">
            <thead>
                <tr>
                    <th class="text-white bg-blue-300 p-2">#</th>
                    <th class="text-white bg-blue-300 p-2">Nama Kategori</th>
                    <th class="text-white bg-blue-300 p-2">Deskripsi</th>
                    <th class="text-white bg-blue-300 p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b border-blue-300">
                        <td class="p-2">{{ $loop->iteration }}</td>
                        <td class="p-2">{{ $category['name'] }}</td>
                        <td class="p-2">{{ $category['description'] }}</td>
                        <td class="p-2 w-max">
                            <div class="flex flex-col items-center my-auto">
                                <button class="p-1 bg-yellow-300 text-white rounded-lg mb-2 flex text-xs"
                                    onclick="showEditForm({{ $category['id'] }})"><i class="bi bi-pencil mr-1"></i>
                                    Ubah</button>
                                <form class="delete-form" action="{{ url('/categories') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $category['id'] }}">
                                    <button class="text-white bg-red-400 p-1 rounded-lg flex text-xs" type="submit"><i
                                            class="bi bi-trash mr-1"></i> Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="absolute z-10 inset-0 bg-gray-500 bg-opacity-60 hidden items-center justify-center" id="edit-form">
            <div class="p-5 bg-white border-2 border-blue-300 rounded-lg w-10/12">
                <p class="text-center font-bold text-xl text-blue-300 mb-5">Edit Kategori</p>
                <form action="{{ url('categories') }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="input-edit-id" value="">
                    <label class="label-flex" for="input-edit-name">
                        Nama kategori:
                        <input class="form-control" type="text" name="name" id="input-edit-name" value="">
                    </label>
                    <label class="label-flex" for="input-edit-description">
                        Deskripsi kategori:
                        <textarea class="form-control" name="description" id="input-edit-description" rows="5"></textarea>
                    </label>
                    <div class="flex justify-center gap-3">
                        <button class="p-1 px-2 bg-emerald-300 text-white rounded-lg text-sm" type="submit"><i
                                class="bi bi-send-fill"></i> Simpan Data</button>
                        <span class="p-1 px-2 bg-red-400 text-white rounded-lg text-sm cursor-pointer"
                            onclick="closeEditForm()"><i class="bi bi-x-lg"></i> Cancel</span>
                    </div>
                </form>
            </div>
        </div>
        <div class="absolute z-10 inset-0 bg-gray-500 bg-opacity-60 hidden items-center justify-center" id="create-form">
            <div class="p-5 bg-white border-2 border-blue-300 rounded-lg w-10/12">
                <p class="text-center font-bold text-xl text-blue-300 mb-5">Buat Kategori Baru</p>
                <form action="{{ url('categories') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="input-edit-id" value="">
                    <label class="label-flex" for="input-edit-name">
                        Nama kategori:
                        <input class="form-control" type="text" name="name" id="input-edit-name" value="">
                    </label>
                    <label class="label-flex" for="input-edit-description">
                        Deskripsi kategori:
                        <textarea class="form-control" name="description" id="input-edit-description" rows="5"></textarea>
                    </label>
                    <div class="flex justify-center gap-3">
                        <button class="p-1 px-2 bg-emerald-300 text-white rounded-lg text-sm" type="submit"><i
                                class="bi bi-send-fill"></i> Simpan Data</button>
                        <span class="p-1 px-2 bg-red-400 text-white rounded-lg text-sm cursor-pointer"
                            onclick="closeCreateForm()"><i class="bi bi-x-lg"></i> Cancel</span>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script>
        function getCategoryById(id) {
            axios.get('/funtastic-blog/api/categories?id=' + id)
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
            var inputEditId = document.getElementById('input-edit-id')
            var inputEditName = document.getElementById('input-edit-name')
            var inputEditDescription = document.getElementById('input-edit-description')
            var editForm = document.getElementById('edit-form')

            inputEditId.value = data['id']
            inputEditName.value = data['name']
            inputEditDescription.value = data['description']
            editForm.classList.replace('hidden', 'flex')
        }

        function showEditForm(id) {
            getCategoryById(id)
        }

        function closeEditForm() {
            var editForm = document.getElementById('edit-form')
            editForm.classList.replace('flex', 'hidden')
        }

        function showCreateForm() {
            var createForm = document.getElementById('create-form')
            createForm.classList.replace('hidden', 'flex')
        }

        function closeCreateForm() {
            var createForm = document.getElementById('create-form')
            createForm.classList.replace('flex', 'hidden')
        }

        var deleteForms = document.getElementsByClassName('delete-form');

        for (var i = 0; i < deleteForms.length; i++) {
            deleteForms[i].addEventListener('submit', function(e) {
                e.preventDefault()
                Swal.fire({
                    title: 'Menghapus Kategori',
                    text: "Apakah kamu yakin akan menghapus kategori ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit()
                    }
                })
            })
        }
    </script>
@endsection
