<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UrbanFarm</title>
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
            max-width: 400px;
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
        <h3 class="text-center mb-4">Login to UrbanFarm</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Input Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Input Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <!-- Link to Register -->
        <div class="text-center mt-3">
            <p>Don't have an account? <a href="{{ route('customers.create') }}">Register here</a></p>
        </div>
    </div>
</div>
</body>
</html>