<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: white;
            width: 900px;
            border-radius: 20px;
            display: flex;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .left-panel {
            background: #0d5c34;
            color: white;
            padding: 40px;
            width: 45%;
        }

        .right-panel {
            padding: 50px;
            width: 55%;
        }

        .btn-login {
            background: #0d5c34;
            color: white;
            width: 100%;
            border-radius: 10px;
            padding: 12px;
            border: none;
        }

        .btn-login:hover {
            background: #094a2a;
            color: white;
        }

        .error-box {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .success-box {
            background: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <!-- Kolom Kiri -->
    <div class="left-panel">

        <img
            src="https://perkim.mubakab.go.id/frontend/img/top-logo.gif"
            width="200px"
            class="mb-3"
        >

        <h3>SISTEM MONITORING REALISASI ANGGARAN</h3>

        <p class="mt-4 small">
            "Bersama membangun Musi Banyuasin yang lebih baik dan berdaya saing."
        </p>

    </div>

    <!-- Kolom Kanan -->
    <div class="right-panel">

        <h3 class="fw-bold">Selamat Datang!</h3>

        <p class="text-muted">
            Silakan login untuk melanjutkan
        </p>

        {{-- PESAN ERROR --}}
        @if ($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- PESAN BERHASIL --}}
        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
                    placeholder="admin@gmail.com"
                    autocomplete="email"
                >

            </div>

            <!-- Password -->
            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                    autocomplete="current-password"
                >

            </div>

            <!-- Tombol -->
            <button
                type="submit"
                class="btn btn-login mb-3"
            >
                LOGIN
            </button>

        </form>

    </div>

</div>

</body>
</html>