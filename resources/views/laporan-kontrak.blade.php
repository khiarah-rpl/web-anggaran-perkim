@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="card border-0 shadow-sm rounded-3 bg-white p-4">
        
        <!-- HEADER HALAMAN & TOMBOL CETAK -->
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
            <div>
                <h4 class="fw-bold text-dark mb-1">Laporan Surat Perjanjian Kontrak Kerja</h4>
                <p class="text-muted small mb-0">Cetak lembar rekapitulasi data kontrak internal dinas.</p>
            </div>
            <button onclick="window.print()" class="btn btn-dark fw-bold px-4 rounded-3 shadow-sm">
                <i class="fa-solid fa-print me-2"></i>Cetak Dokumen Laporan
            </button>
        </div>

        <!-- REKAPITULASI KERTAS FISIK -->
        <div class="p-4 border rounded bg-white mx-auto shadow-xs" style="max-width: 1000px; font-family: 'Bookman Old Style', Georgia, serif;">
            
            <!-- KOP SURAT DINAS -->
            <div class="text-center mb-4">
                <h4 class="fw-bold mb-1" style="letter-spacing: 1px; font-size: 18px;">PEMERINTAH KABUPATEN MUSI BANYUASIN</h4>
                <h3 class="fw-bold mb-1" style="letter-spacing: 1.5px; font-size: 22px;">DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</h3>
                <p class="text-muted mb-0" style="font-size: 12px; font-style: italic;">Jl. Raya Sekayu - Teladan, Kecamatan Sekayu, Musi Banyuasin</p>
                <hr style="border: 2px solid #000; opacity: 1; margin-top: 15px; margin-bottom: 5px;">
                <hr style="border: 1px solid #000; opacity: 1; margin-top: 0; margin-bottom: 20px;">
            </div>

            <div class="text-center mb-4">
                <h5 class="fw-bold text-uppercase border-bottom d-inline-block pb-1" style="font-size: 15px; letter-spacing: 0.5px;">
                    REKAPITULASI LAPORAN DATA KONTRAK UTAMA
                </h5>
            </div>

            <!-- TABEL DATA -->
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-dark" style="font-size: 13px;">
                    <thead class="table-light text-center fw-bold">
                        <tr>
                            <th style="width: 5%;" class="py-3">No</th>
                            <th style="width: 25%;" class="py-3">Nomor Kontrak</th>
                            <th style="width: 40%;" class="py-3">Uraian Pekerjaan / Kegiatan</th>
                            <th style="width: 15%;" class="py-3">Penyedia Jasa</th>
                            <th style="width: 15%;" class="py-3">Nilai Kontrak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allData as $index => $item)
                        <tr>
                            <td class="text-center fw-bold">{{ $index + 1 }}</td>
                            <td class="fw-semibold text-center">{{ $item->nomor_kontrak ?? '-' }}</td>
                            <td>{{ $item->kegiatan }}</td>
                            <td>{{ $item->nama_alamat_penyedia ?? '-' }}</td>
                            <td class="text-success fw-bold text-end">Rp {{ number_format($item->nilai_kontrak_awal, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-folder-open fa-2x mb-2 d-block"></i>
                                Belum ada data kegiatan terisi. Silakan isi data lewat menu <strong>Data Kegiatan (Uraian)</strong> terlebih dahulu.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
@endsection