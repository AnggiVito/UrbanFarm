<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - UrbanFarm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e8f5e9; /* Warna hijau lembut untuk latar belakang */
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            margin: 50px auto;
        }
        h3 {
            color: #2e7d32; /* Hijau elegan untuk judul */
        }
        .btn-primary {
            background-color: #43a047;
            border-color: #43a047;
        }
        .btn-primary:hover {
            background-color: #2e7d32;
            border-color: #2e7d32;
        }
        .form-label {
            color: #1b5e20;
        }
        a {
            color: #2e7d32;
            text-decoration: none;
        }
        a:hover {
            color: #1b5e20;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
        <h3 class="text-center mb-4">Register for UrbanFarm</h3>
        <form method="POST" action="{{ route('customers.store') }}">
            @csrf
            <!-- Input Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name" required>
            </div>

            <!-- Input Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            </div>

            <!-- Input Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Input Alamat -->
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Enter your address" required>{{ old('alamat') }}</textarea>
            </div>

            <!-- Input No. Telepon -->
            <div class="mb-3">
                <label for="telp" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="telp" name="telp" value="{{ old('telp') }}" placeholder="Enter your phone number" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>

        <!-- Back to Login -->
        <div class="text-center mt-3">
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </div>
</div>
</body>
</html>