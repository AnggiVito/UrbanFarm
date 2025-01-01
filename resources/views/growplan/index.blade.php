<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Growplan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-header bg-success text-white text-center">
                <h1 class="my-2">Daftar Growplan</h1>
            </div>
            <div class="card-body">
                <!-- Tampilkan pesan sukses -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tombol Tambah Growplan -->
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="text-success">Kelola Growplan Anda di sini:</h5>
                    <a href="{{ route('growplan.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Tambah Growplan
                    </a>
                </div>

                <!-- Tabel Growplan -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-success text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama Growplan</th>
                                <th>Benih</th>
                                <th>Tanggal Mulai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($growplan as $growplan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $growplan->tittle }}</td>
                                    <td>{{ $growplan->seed }}</td>
                                    <td>{{ $growplan->tanggal }}</td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('growplan.edit', $growplan->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>

                                        <!-- Form Hapus -->
                                        <form action="{{ route('growplan.destroy', $growplan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus Growplan ini?');">
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
                                    <td colspan="6" class="text-center text-muted">Belum ada Growplan yang ditambahkan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
