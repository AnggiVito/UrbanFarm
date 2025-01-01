<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Video</title>

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
        .table-success {
            background-color: #28a745;
        }
        .table-success th {
            color: white;
        }
        .rounded {
            border: 2px solid #28a745;
        }
        .btn-warning, .btn-danger {
            font-size: 0.85rem;
        }
        .btn-warning i, .btn-danger i {
            margin-right: 5px;
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
                <h1 class="my-2"><i class="fas fa-video"></i> Daftar Video</h1>
            </div>
            <div class="card-body">
                <!-- Tampilkan pesan sukses -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tombol Tambah Video -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <input type="text" id="searchInput" class="form-control w-50" placeholder="Cari video berdasarkan judul...">
                    <a href="{{ route('video.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Tambah Video
                    </a>
                </div>

                <!-- Tabel Video -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-success">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($video as $video)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($video->photo)
                                            <img src="{{ asset('storage/' . $video->photo) }}" alt="Thumbnail" width="100" class="rounded">
                                        @else
                                            <span class="text-muted">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="fw-bold text-success">{{ $video->tittle }}</td>
                                    <td>{{ Str::limit($video->description, 50) }}</td>
                                    <td>
                                        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus video ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada video yang ditambahkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Pencarian -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('table tbody tr');

            rows.forEach(row => {
                const title = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
