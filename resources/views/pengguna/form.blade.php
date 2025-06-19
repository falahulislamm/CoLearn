<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Centering the form container */
        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container form-container">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Informasi Pengguna</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('pengguna.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="text" name="nama" id="nama" 
                                    value="{{ $pengguna->nama }}" 
                                    class="form-control" placeholder="Masukkan Nama Anda" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="number" name="nim" id="nim" 
                                    value="{{ $pengguna->nim }}" 
                                    class="form-control" placeholder="Masukkan NIM Anda" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <input type="email" name="email" id="email" 
                                    value="{{ $pengguna->email }}" 
                                    class="form-control" placeholder="Masukkan Email Anda" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No HP</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-telephone-fill"></i>
                                </span>
                                <input type="number" name="telp" id="telp" 
                                    value="{{ $pengguna->telp }}" 
                                    class="form-control" placeholder="Masukkan Nomor Aktif Anda" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jurusan_id">Jurusan</label>
                            <div class="row container">
                            <select name="jurusan_id" class="form-select form-select-lg">
                                <option>--Pilih Jurusan--</option>
                                @foreach($list_jurusan as $jurusan)
                                <option value="{{ $jurusan->id }}" {{ $pengguna->jurusan_id==$jurusan->id ? 'selected': ''}}>
                                    {{ $jurusan->nama }}
                                </option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="peminatan_id">Peminatan</label>
                            <div class="row container">
                            <select name="peminatan_id" class="form-select form-select-lg">
                                <option>--Pilih Peminatan--</option>
                                @foreach($list_peminatan as $peminatan)
                                <option value="{{ $peminatan->id }}" {{ $pengguna->peminatan_id==$peminatan->id ? 'selected': ''}}>
                                    {{ $peminatan->nama }}
                                </option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $pengguna->id }}">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg mt-3">
                                <i class="bi bi-send"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>