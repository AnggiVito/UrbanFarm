<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Video</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .card-header {
            background: #28a745;
            color: white;
        }
        .card-header h1 {
            font-size: 2rem;
            font-weight: bold;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }
        .form-label {
            font-weight: bold;
            color: #28a745;
        }
        footer {
            text-align: center;
            padding: 1rem 0;
            margin-top: 20px;
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <div class="card shadow border-0">
            <div class="card-header text-center">
                <h1><i class="fas fa-plus-circle"></i> Tambah Video</h1>
            </div>
            <div class="card-body">
                <!-- Form Tambah Video -->
                <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="tittle" class="form-label">Judul Video</label>
                        <input 
                            type="text" 
                            name="tittle" 
                            id="tittle" 
                            class="form-control" 
                            placeholder="Masukkan judul video" 
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto (Thumbnail)</label>
                        <input 
                            type="file" 
                            name="photo" 
                            id="photo" 
                            class="form-control" 
                            accept="image/*">
                        <small class="form-text text-muted">Format yang didukung: JPG, PNG, GIF</small>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea 
                            name="description" 
                            id="description" 
                            class="form-control" 
                            rows="5" 
                            placeholder="Masukkan deskripsi video" 
                            required></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('video.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan Video
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
