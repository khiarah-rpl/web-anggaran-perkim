@extends('layouts.app')

@section('content')
<div class="container-fluid px-0">

    <!-- 4 KARTU REKAPITULASI ATAS -->
    <div class="row g-3 mb-4">

        <!-- KONTRAK AKTIF -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted fw-semibold">
                            Kontrak Aktif
                            <i class="fa-solid fa-chart-line text-success small"></i>
                        </small>

                        <h2 class="fw-bold mb-0 mt-1 text-dark">
                            {{ $totalKontrak }}
                        </h2>

                        <small class="text-muted" style="font-size: 11px;">
                            Total Berkas Kontrak
                        </small>
                    </div>

                    <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                        <i class="fa-solid fa-file-signature fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- KEGIATAN TERDATA -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted fw-semibold">
                            Kegiatan Terdata
                            <i class="fa-solid fa-chart-line text-success small"></i>
                        </small>

                        <h2 class="fw-bold mb-0 mt-1 text-dark">
                            {{ $totalKegiatan }}
                        </h2>

                        <small class="text-muted" style="font-size: 11px;">
                            Uraian Pekerjaan Inputan
                        </small>
                    </div>

                    <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                        <i class="fa-solid fa-list-check fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- NILAI PAGU KONTRAK -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted fw-semibold">
                            Nilai Pagu Kontrak
                            <i class="fa-solid fa-chart-line text-warning small"></i>
                        </small>

                        <h2 class="fw-bold mb-0 mt-1 text-dark">
                            Rp {{ number_format($nilaiKontrak ?? 0, 0, ',', '.') }}
                        </h2>

                        <small class="text-muted" style="font-size: 11px;">
                            Akumulasi Nilai Kontrak
                        </small>
                    </div>

                    <div class="bg-warning bg-opacity-10 p-3 rounded-3 text-warning">
                        <i class="fa-solid fa-wallet fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- TOTAL PENCAIRAN SPM -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-3 p-3 bg-white h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted fw-semibold">
                            Total Pencairan SPM
                            <i class="fa-solid fa-chart-line text-primary small"></i>
                        </small>

                        <h2 class="fw-bold mb-0 mt-1 text-dark">
                            Rp {{ number_format($totalPembayaran ?? 0, 0, ',', '.') }}
                        </h2>

                        <small class="text-muted" style="font-size: 11px;">
                            Dana Terkabul ({{ $totalSpm }} SPM)
                        </small>
                    </div>

                    <div class="bg-primary bg-opacity-10 p-3 rounded-3 text-primary">
                        <i class="fa-solid fa-money-check-dollar fa-xl"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- BAGIAN UTAMA -->
    <div class="row g-4">

        <!-- KOLOM KIRI -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 bg-white p-4 h-100">

                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-building text-success me-2"></i>
                    <h6 class="fw-bold mb-0 text-dark">
                        Profil Kantor Perkim
                    </h6>
                </div>

                <!-- LOGO -->
                <div class="text-center">
                    <img
                        src="https://perkim.mubakab.go.id/frontend/img/top-logo.gif"
                        class="img-fluid mb-3"
                        alt="Logo Perkim"
                        style="max-height: 120px;"
                    >
                </div>

                <h6
                    class="fw-bold mb-1 text-dark"
                    style="font-size: 14px;"
                >
                    Dinas Perumahan & Kawasan Permukiman
                </h6>

                <p class="text-muted small mb-3">
                    Kabupaten Musi Banyuasin, Sekayu, Sumatera Selatan.
                </p>

                <hr>

                <!-- INFORMASI KONTAK -->
                <div class="text-start small mb-3">

                    <h6 class="fw-bold text-dark mb-2">
                        Informasi Kontak
                    </h6>

                    <ul class="list-unstyled mb-0">

                        <li class="mb-2">
                            <i class="fa-solid fa-envelope text-success me-2"></i>
                            perkim@mubakab.go.id
                        </li>

                        <li class="mb-2">
                            <i class="fa-solid fa-phone text-success me-2"></i>
                            (0711) 1234567
                        </li>

                        <li>
                            <i class="fa-solid fa-location-dot text-danger me-2"></i>
                            Sekayu, Musi Banyuasin
                        </li>

                    </ul>
                </div>

                <a
                    href="https://perkim.mubakab.go.id"
                    target="_blank"
                    class="btn btn-success w-100 py-2 fw-bold rounded-3 mt-auto"
                >
                    <i class="fa-solid fa-globe me-2"></i>
                    Web Perkim Muba
                </a>

            </div>
        </div>


        <!-- KOLOM KANAN -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3 bg-white p-4 h-100">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-rotate-left text-success me-2"></i>

                        <h6 class="fw-bold mb-0 text-dark">
                            5 Kontrak/Kegiatan Terbaru dari Input Data
                        </h6>
                    </div>

                    <a
                        href="{{ url('/kegiatan') }}"
                        class="btn btn-outline-success btn-sm px-3 rounded-pill fw-semibold"
                    >
                        Lihat Semua
                        <i
                            class="fa-solid fa-chevron-right ms-1"
                            style="font-size: 10px;"
                        ></i>
                    </a>

                </div>


                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr
                                class="text-uppercase text-muted"
                                style="font-size: 12px; letter-spacing: 0.5px;"
                            >
                                <th style="width: 8%;">
                                    No
                                </th>

                                <th style="width: 47%;">
                                    Nama Kegiatan
                                </th>

                                <th style="width: 25%;">
                                    Nilai Kontrak
                                </th>

                                <th
                                    style="width: 20%;"
                                    class="text-end"
                                >
                                    Tanggal Input
                                </th>
                            </tr>
                        </thead>


                        <tbody>

                            @forelse($kegiatanTerbaru as $index => $item)

                                <tr style="font-size: 13px;">

                                    <td class="fw-bold text-secondary">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="fw-semibold text-dark">
                                        {{ \Illuminate\Support\Str::limit(
                                            $item->program_kegiatan ?? 'Belum ada nama kegiatan',
                                            60
                                        ) }}
                                    </td>

                                    <td class="text-success fw-bold">
                                        Rp
                                        {{ number_format(
                                            $item->nilai_kontrak ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </td>

                                    <td class="text-muted text-end">
                                        {{ $item->created_at
                                            ? $item->created_at->format('d/m/Y')
                                            : '-' }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td
                                        colspan="4"
                                        class="text-center py-5"
                                    >

                                        <div class="text-muted opacity-50 mb-3">
                                            <i class="fa-solid fa-folder-open fa-3x"></i>
                                        </div>

                                        <p class="text-muted small mb-0">
                                            Belum ada data kegiatan terisi.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

    </div>


    <!-- REKAP PROGRAM -->
    <div class="row mt-4">

        <div class="col-12">

            <div class="card border-0 shadow-sm rounded-3 bg-white p-4">

                <div class="d-flex align-items-center mb-3">
                    <i class="fa-solid fa-chart-column text-success me-2"></i>

                    <h6 class="fw-bold mb-0 text-dark">
                        Rekap Program Kegiatan
                    </h6>
                </div>


                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr
                                class="text-uppercase text-muted"
                                style="font-size: 12px;"
                            >
                                <th>No</th>
                                <th>Program Kegiatan</th>
                                <th>Jumlah</th>
                                <th>Total Kontrak</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($rekapProgram as $index => $program)

                                <tr style="font-size: 13px;">

                                    <td class="fw-bold">
                                        {{ $index + 1 }}
                                    </td>

                                    <td>
                                        {{ $program->program_kegiatan ?: '-' }}
                                    </td>

                                    <td>
                                        {{ $program->jumlah }}
                                    </td>

                                    <td class="fw-bold text-success">
                                        Rp
                                        {{ number_format(
                                            $program->total_kontrak ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td
                                        colspan="4"
                                        class="text-center text-muted py-4"
                                    >
                                        Belum ada rekap program kegiatan.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection