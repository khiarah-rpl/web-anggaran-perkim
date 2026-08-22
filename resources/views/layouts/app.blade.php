<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Monitoring Realisasi Anggaran</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Gaya Sidebar Default */
        .sidebar {
            min-height: 100vh;
            background-color: #0d5c34; /* Hijau Khas Perkim */
            color: #fff;
        }
        .sidebar a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-radius: 8px;
            margin: 4px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-weight: 600;
        }
        
        /* CSS KHUSUS PRINT: Menyembunyikan elemen sistem saat cetak */
        @media print {
            .no-print, 
            aside, 
            nav, 
            .sidebar, 
            .navbar, 
            .btn, 
            footer {
                display: none !important;
            }
            main, 
            .content, 
            .container, 
            .card {
                margin: 0 !important;
                padding: 0 !important;
                border: none !important;
                box-shadow: none !important;
                width: 100% !important;
                max-width: 100% !important;
            }
            body {
                background-color: #fff !important;
                color: #000 !important;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR (no-print mencegah bagian ini ikut tercetak) -->
        <aside class="col-md-3 col-lg-2 px-0 sidebar d-flex flex-column justify-content-between py-4 no-print">
            <div>
                <!-- Brand Dinas -->
                <div class="text-center mb-4 px-3">
                   <img src="{{ asset('img/logo-muba.jpg') }}" alt="Logo Muba" style="width: 100px;" class="mb-2"> 
                    <h6 class="fw-bold mb-0 text-white">MUSI BANYUASIN</h6>
                    <small class="text-white-50" style="font-size: 10px;">Dinas Perumahan & Permukiman</small>
                </div>
                <hr class="text-white-50 mx-3">
                
                <!-- Menu Navigasi Utama -->
                <nav class="nav flex-column">
                    <a href="{{ route('dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge me-2"></i> Dashboard
                    </a>
                    <a href="{{ route('kontrak.index') }}" class="{{ Request::is('kontrak*') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-signature me-2"></i> Data Kontrak
                    </a>
                    <a href="{{ route('kegiatan.index') }}" class="{{ Request::is('kegiatan*') ? 'active' : '' }}">
                        <i class="fa-solid fa-list-check me-2"></i> Data Kegiatan (Uraian)
                    </a>
                    <a href="{{ route('laporan.spm') }}" class="{{ Request::is('laporan-spm*') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-lines me-2"></i> Data SPM
                    </a>
                    <a href="{{ route('pembayaran.index') }}" class="{{ Request::is('pembayaran*') ? 'active' : '' }}">
                        <i class="fa-solid fa-credit-card me-2"></i> Pembayaran
                    </a>
                    <a href="{{ route('kalender.index') }}" class="{{ Request::is('kalender*') ? 'active' : '' }}">
                        <i class="fa-solid fa-calendar-days me-2"></i> Kalender Kegiatan
                    </a>
                </nav>
            </div>

            <!-- Bagian Tombol Aksi di Bawah Sidebar -->
            <div class="px-3">
                <!-- Tombol Cetak Laporan (Hanya muncul jika sedang membuka halaman cetak laporan) -->
                @if(Request::is('laporan-spm') || Request::is('laporan-kontrak'))
                <button onclick="window.print()" class="btn btn-warning w-100 py-2 fw-bold rounded-3 shadow-sm text-dark mb-2">
                    <i class="fa-solid fa-print me-2"></i>Cetak Laporan
                </button>
                @endif
                
                <!-- Tombol Logout -->
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 py-2 fw-bold rounded-3 text-white m-0">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>Keluar Aplikasi
                    </button>
                </form>
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>