<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Artikel - UrbanFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .article-image {
            max-height: 300px;
            max-width: 100%;
            display: block;
            margin: 20px auto; /* Center the image */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .card-title {
            color: #343a40;
            font-weight: bold;
        }
        .card-text {
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Detail Artikel</h1>
        <a href="{{ route('artikel.index') }}" class="btn btn-custom">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Artikel
        </a>
    </div>

    <!-- Article Detail -->
    <div class="card">
        <div class="card-body text-center">
            <!-- Smaller centered image -->
            <img src="{{ asset('storage/' . $artikel->photo) }}" alt="Foto Artikel" class="article-image">
            <h2 class="card-title mt-3">{{ $artikel->tittle }}</h2>
            <p class="text-muted"><i class="fas fa-calendar-alt"></i> Dipublikasikan pada: {{ $artikel->created_at->format('d M Y') }}</p>
            <hr>
            <p class="card-text text-start">{{ $artikel->text }}</p>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between">
                <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit Artikel
                </a>
                <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Hapus Artikel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
