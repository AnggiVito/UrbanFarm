<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - UrbanFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #f9fff7;
        }
        .navbar {
            background-color: #4caf50;
        }
        .navbar-brand,
        .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            background-color: #388e3c;
            color: white !important;
        }
        .content-section {
            margin-top: 40px;
        }
        .floating-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4caf50;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            font-size: 24px;
            cursor: pointer;
        }
        .floating-btn:hover {
            background-color: #388e3c;
        }
        .icon {
            font-size: 48px;
            color: #4caf50;
        }
        .card-title {
            font-weight: bold;
        }
        h3.section-title {
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">UrbanFarm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">E-Commerce</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chat.index') }}">Chat Komunitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container content-section mt-4">
        <!-- Artikel dan Video Section -->
        <div class="row mb-5">
            <!-- Artikel Section -->
            <div class="col-md-6">
                <div class="text-center">
                    <i class="fa-solid fa-newspaper icon" style="font-size: 50px; color: green;"></i>
                    <h5 class="card-title mt-3">Artikel Urban Farming</h5>
                    <p>Baca artikel menarik untuk menambah wawasan Anda.</p>
                    <a href="{{ route('artikel.index') }}" class="btn btn-success">Lihat Artikel</a>
                </div>
            </div>

            <!-- Video Section -->
            <div class="col-md-6">
                <div class="text-center">
                    <i class="fa-solid fa-video icon" style="font-size: 50px; color: green;"></i>
                    <h5 class="card-title mt-3">Video Tutorial</h5>
                    <p>Tonton video untuk memahami teknik urban farming.</p>
                    <a href="{{ route('video.index') }}" class="btn btn-success">Lihat Video</a>
                </div>
            </div>
        </div>

        <!-- Aktivitas Section -->
        <div class="row">
            <div class="col-12">
                <h3 class="section-title">Aktivitas (History Growplan)</h3>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead style="background-color: #4caf50; color: white;">
                        <tr>
                            <th>Nama Plan</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Floating Button for Adding Growplan -->
    <div class="floating-btn">
        <i class="fa-solid fa-plus"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>
</html>
