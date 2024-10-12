<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPH Batam</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Bootstrap CSS -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: url('{{ asset('assets/img/ph.jpg') }}') no-repeat center center fixed; /* Menggunakan gambar sebagai latar belakang */
            background-size: cover; /* Menutupi seluruh area */
        }

        /* Container for the whole login page */
        .login-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            backdrop-filter: blur(5px); /* Efek blur untuk latar belakang */
        }

        /* Login box styling */
        .login-box {
            background-color: rgba(255, 255, 255, 0.9); /* Warna latar belakang putih dengan transparansi */
            border: 1px solid #dbdbdb;
            padding: 40px 30px;
            width: 100%;
            max-width: 350px;
            margin-bottom: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 20px; /* Mengubah sudut menjadi bulat */
        }

        /* Logo styling */
        .logo {
            font-family: 'Billabong', cursive;
            font-size: 50px;
            color: #262626;
            margin-bottom: 30px;
        }

        /* Input field styling */
        .input-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px 10px;
            background: #fafafa;
            border: 1px solid #dbdbdb;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #a8a8a8;
            box-shadow: none;
        }

        /* Login button styling */
        .btn-block {
            width: 100%;
            background-color: #3897f0;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 10px;
        }

        .btn-block:hover {
            background-color: #3177d9;
        }

        /* OR separator */
        .or-separator {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
            font-size: 14px;
            color: #8e8e8e;
        }

        .or-separator::before,
        .or-separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #dbdbdb;
            margin: 0 16px;
        }

        /* Facebook login link */
        .login-with-facebook {
            color: #385185;
            font-weight: 600;
            text-decoration: none;
        }

        .login-with-facebook:hover {
            text-decoration: underline;
        }

        /* Forgot password link */
        .forgot-password a {
            color: #00376b;
            font-size: 12px;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Signup box */
        .signup-box {
           
           
           
            width: 100%;
            max-width: 350px;
           
        }

        .signup-box p {
            font-size: 14px;
            color: #262626;
        }

        .signup-box a {
            color: #3897f0;
            text-decoration: none;
        }

        .signup-box a:hover {
            text-decoration: underline;
        }

        /* Logo image styling */
        .logo-image {
            max-width: 150px; /* Perbesar ukuran logo */
        }

        .welcome-text {
            font-size: 20px; /* Ukuran font untuk teks selamat datang */
            color: #262626;
            margin-top: 10px; /* Mengurangi jarak antara logo dan teks */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <!-- Gambar logo -->
            <div class="text-center">
                <img src="{{ asset('assets/img/1.jpg') }}" alt="Logo Toko Bunga Batam" class="logo-image">
            </div>

            <!-- Nama Toko Bunga -->
            <h1 class="welcome-text text-center">Sistem Informasi Program OSIS  </h1>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="input-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                
                <div class="or-separator">
                    <span>OR</span>
                </div>

                <div class="text-center">
                    <a href="#" class="login-with-facebook">Log in with Facebook</a>
                </div>
                
                <div class="forgot-password text-center mt-3">
                    <a href="#">Forgot Password?</a>
                </div>
                 <div class="signup-box text-center">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
        </div>
            </form>
        </div>

          </div>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Bootstrap JS -->
</body>
</html>
