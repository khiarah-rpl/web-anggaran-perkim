<!DOCTYPE html>
<html lang="id">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #eef2f3; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .login-box { background: white; width: 900px; border-radius: 20px; display: flex; box-shadow: 0 10px 25px rgba(0,0,0,0.1); overflow: hidden; }
        .left-panel { background: #0d5c34; color: white; padding: 40px; width: 45%; }
        .right-panel { padding: 50px; width: 55%; }
        .btn-login { background: #0d5c34; color: white; width: 100%; border-radius: 10px; padding: 12px; }
    </style>
</head>
<body>

<div class="login-box">
    <!-- Kolom Kiri: Sesuai Desain -->
    <div class="left-panel">
        <img src="https://perkim.mubakab.go.id/frontend/img/top-logo.gif" width="200px" class="mb-3">
        <h3>SISTEM MONITORING REALISASI ANGGARAN</h3>
        <p class="mt-4 small">"Bersama membangun Musi Banyuasin yang lebih baik dan berdaya saing."</p>
    </div>

    <!-- Kolom Kanan: Form -->
    <div class="right-panel">
        <h3 class="fw-bold">Selamat Datang!</h3>
        <p class="text-muted">Silakan login untuk melanjutkan</p>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required placeholder="admin@gmail.com">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-login mb-3">LOGIN</button>
        </form>
    </div>
</div>

</body>
</html>