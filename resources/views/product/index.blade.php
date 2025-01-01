<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .product-image {
            height: 150px;
            object-fit: cover;
        }
        .card-body {
            padding: 10px;
        }
        .product-title {
            font-size: 1.2em;
            font-weight: bold;
            color: #2c3e50;
        }
        .product-price {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Produk</h1>

        <!-- Tampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tombol Tambah Produk -->
        <div class="text-end mb-3">
            <a href="{{ route('product.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle-fill"></i> Tambah Produk
            </a>
        </div>

        <!-- Grid Produk -->
        <div class="row g-3">
            @forelse($product as $product)
                <div class="col-md-4 col-lg-3">
                    <div class="product-card">
                        <img src="{{ $product->photo ? asset('storage/' . $product->photo) : 'https://via.placeholder.com/150' }}" alt="Foto Produk" class="w-100 product-image">
                        <div class="card-body">
                            <h5 class="product-title">{{ $product->nama }}</h5>
                            <p class="product-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <p class="text-muted">{{ Str::limit($product->description, 50) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada produk yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
