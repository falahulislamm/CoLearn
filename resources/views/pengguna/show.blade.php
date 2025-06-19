<x-layout>
<x-slot name="title">Data Pengguna</x-slot> 
<x-slot name="breadcrumb_active">Pengguna</x-slot>
<x-slot name="card_footer">@CoLearn</x-slot>

<h2 class="text-center">Data Pengguna</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Create New Trainer -->
        
        <a href="{{ route('pengguna.create') }}">
            <button class="btn mb-1" style="background-color: #87CEEB; border-color: #87CEEB;">
                <i class="fa-solid fa-plus"></i> Tambah Baru
            </button>
        </a>

        <!-- Form Search -->
        <form action="{{ route('pengguna.search') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
<table class="table table-bordered text-center align-middle">
    <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Peminatan</th>
            <th class="col-3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list_pengguna as $pengguna)
        <tr>
            <td class="fw-bold">{{ $pengguna->id }}</td>
            <td>{{ ucwords($pengguna->user ? $pengguna->user->name : 'User not found') }}</td>
            <td>
                <span>{{ $pengguna->nim }}</span>
            </td>
            <td>
                <span class="badge bg-primary">{{ ucwords($pengguna->jurusan->nama ?? 'Null') }}</span>
            </td>
            <td>
                <span>{{ ucwords($pengguna->peminatan->nama ?? 'Null') }}</span>
            </td>
            <td>
            
                <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" class="d-inline">
            
                    <a href="#" class="me-5 mx-2" data-bs-toggle="modal" data-bs-target="#viewModal" onclick="loadpengguna({{ $pengguna->id }})">
                        <i class="fas fa-eye" style="color: black;"></i>
                    </a>
                    <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="me-5 mx-2">
                        <i class="bi bi-pencil-square" style="color: purple;"></i>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="me-5 mx-2" style="background: none; border: none; padding: 0;">
                        <i class="bi bi-trash text-danger"></i>
                    </button>
                </form>
            
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4" id="exampleModalLabel">Detail Pengguna</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Loading...</p> <!-- Isi akan diganti dengan data dari server -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</x-layout>

<script>
    function loadpengguna(id) {
    const url = `/pengguna/${id}`; // URL berdasarkan rute Anda

    // Kosongkan modal sebelum data baru dimuat
    const modalBody = document.querySelector('#viewModal .modal-body');
    modalBody.innerHTML = '<p>Loading...</p>';

    // Ambil data trainer melalui AJAX
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {

            // Fungsi untuk memformat tanggal ISO menjadi format yang diinginkan
        function formatDate(isoString) {
            const date = new Date(isoString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Bulan dimulai dari 0
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');
            return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        }

        function capitalizeWords(str) {
            return str.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
        }

            // Isi modal dengan data dari server
            modalBody.innerHTML = `
                <table class="table table-striped table-sm">
                    <tr><th class="w-25">ID</th><td>${data.id}</td></tr>
                    <tr><th>Pengguna</th><td>${capitalizeWords(data.user.name)}</td></tr>
                    <tr><th>NIM</th><td>${data.nim}</td></tr>
                    <tr><th>Email</th><td>${data.user.email}</td></tr>
                    <tr><th>No Telp</th><td>${data.telp}</td></tr>
                    <tr><th>Jurusan</th><td>${capitalizeWords(data.jurusan.nama ?? 'Null')}</td></tr>
                    <tr><th>Peminatan</th><td>${capitalizeWords(data.peminatan.nama ?? 'Null')}</td></tr>
                    <tr><th>Dibuat: </th><td>${formatDate(data.created_at)}</td></tr>
                    <tr><th>Diperbarui: </th><td>${formatDate(data.updated_at)}</td></tr>
                </table>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
            modalBody.innerHTML = '<p>Error loading data.</p>';
        });
}
</script>