<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel - UrbanFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Tambah Artikel Baru</h1>
        <a href="{{ route('artikel.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Alert for Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Artikel -->
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="tittle" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" id="tittle" name="tittle" value="{{ old('tittle') }}" placeholder="Masukkan judul artikel" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto Artikel</label>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Deskripsi Artikel</label>
            <textarea class="form-control" id="text" name="text" rows="5" placeholder="Tulis deskripsi artikel..." required>{{ old('text') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan Artikel
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
