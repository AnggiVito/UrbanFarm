<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Growplan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white text-center">
                <h1 class="my-2">Tambah Growplan</h1>
            </div>
            <div class="card-body">
                <!-- Menampilkan pesan error validation jika ada -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form untuk menambah Growplan -->
                <form action="{{ route('growplan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tittle" class="form-label">Judul Growplan</label>
                        <input type="text" class="form-control" id="tittle" name="tittle" required>
                    </div>

                    <div class="mb-3">
                        <label for="seed" class="form-label">Jenis Benih</label>
                        <input type="text" class="form-control" id="seed" name="seed" required>
                    </div>

                    <div class="mb-3">
                        <label for="land" class="form-label">Ukuran Lahan (M)</label>
                        <input type="text" class="form-control" id="land" name="land" required>
                    </div>

                    <div class="mb-3">
                        <label for="soil" class="form-label">Jenis Tanah</label>
                        <input type="text" class="form-control" id="soil" name="soil" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Growplan</button>
                    <a href="{{ route('growplan.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
