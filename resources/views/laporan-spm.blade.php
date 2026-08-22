@extends('layouts.app')

@section('content')
<div class="container py-2">
    <!-- Judul Halaman Layar Monitor (no-print) -->
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3 no-print">
        <div>
            <h4 class="fw-bold text-dark mb-1">Laporan Pengajuan Surat Perintah Membayar (SPM)</h4>
            <p class="text-muted small mb-0">Gunakan tombol <span class="badge bg-warning text-dark"><i class="fa-solid fa-print me-1"></i> Cetak Laporan</span> di sidebar kiri untuk mencetak dokumen fisik.</p>
        </div>
    </div>

    <!-- AREA DOKUMEN FISIK UTAMA (PRINT OUT) -->
    <div class="p-5 border rounded bg-white mx-auto shadow-sm text-black" style="max-width: 1000px; font-family: 'Bookman Old Style', Georgia, serif; line-height: 1.6;">
        
        <!-- KOP SURAT DINAS RESMI -->
        <div class="text-center mb-4">
            <h4 class="fw-bold mb-1" style="letter-spacing: 0.5px; font-size: 18px;">PEMERINTAH KABUPATEN MUSI BANYUASIN</h4>
            <h3 class="fw-bold mb-1" style="letter-spacing: 1px; font-size: 21px;">DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</h3>
            <p class="mb-0" style="font-size: 12px; font-style: italic;">Jl. Raya Sekayu - Teladan, Kecamatan Sekayu, Musi Banyuasin</p>
            <!-- Double Line Separator Dinas -->
            <hr style="border: 2px solid #000; opacity: 1; margin-top: 15px; margin-bottom: 4px;">
            <hr style="border: 0.5px solid #000; opacity: 1; margin-top: 0; margin-bottom: 25px;">
        </div>

        <!-- JUDUL DOKUMEN REKAP -->
        <div class="text-center mb-4">
            <h5 class="fw-bold text-uppercase border-bottom d-inline-block pb-1" style="font-size: 14px; letter-spacing: 0.5px;">
                REKAPITULASI LAPORAN DATA SURAT PERINTAH MEMBAYAR (SPM)
            </h5>
        </div>

        <!-- TABEL REKAPITULASI DATA -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-black" style="font-size: 13px; border: 1px solid #000;">
                <thead class="text-center fw-bold" style="background-color: #f8f9fa;">
                    <tr style="border-bottom: 2px solid #000;">
                        <th style="width: 5%; border: 1px solid #000;" class="py-2">No</th>
                        <th style="width: 25%; border: 1px solid #000;" class="py-2">Nomor SPM</th>
                        <th style="width: 45%; border: 1px solid #000;" class="py-2">Uraian Kegiatan Pekerjaan</th>
                        <th style="width: 15%; border: 1px solid #000;" class="py-2">Jumlah Dana Keluar</th>
                        <th style="width: 10%; border: 1px solid #000;" class="py-2">Status Realisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($allData as $index => $item)
                    <tr>
                        <td class="text-center fw-bold" style="border: 1px solid #000;">{{ $index + 1 }}</td>
                        <td class="text-center" style="border: 1px solid #000;">{{ $item->nomor_spm ?? '-' }}</td>
                        <td style="border: 1px solid #000; padding-left: 10px; padding-right: 10px;">{{ $item->kegiatan }}</td>
                        <td class="text-end fw-bold" style="border: 1px solid #000; padding-right: 10px;">Rp {{ number_format($item->nilai_spm, 0, ',', '.') }}</td>
                        <td class="text-center" style="border: 1px solid #000;">
                            @if($item->nilai_spm > 0)
                                <span class="badge bg-success text-white px-2 py-1 rounded" style="font-size: 10px;">Cair</span>
                            @else
                                <span class="badge bg-secondary text-white px-2 py-1 rounded" style="font-size: 10px;">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <!-- JIKA DATABASE KOSONG -->
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted" style="border: 1px solid #000;">
                            <div class="opacity-50 mb-2">
                                <i class="fa-solid fa-folder-open fa-2x"></i>
                            </div>
                            Belum ada data kegiatan terisi. Silakan isi data baru di menu <strong>Data Kegiatan (Uraian)</strong>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- KOLOM TANDA TANGAN DINAS (TAMPIL HANYA JIKA ADA DATA) -->
        @if($allData->count() > 0)
        <div class="row mt-5 pt-3">
            <div class="col-7"></div>
            <div class="col-5 text-center" style="font-size: 13px;">
                <p class="mb-1">Sekayu, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p class="fw-bold mb-5" style="line-height: 1.4;">PEJABAT PEMBUAT KOMITMEN (PPK)<br>KABUPATEN MUSI BANYUASIN</p>
                <p class="fw-bold text-decoration-underline mb-0" style="font-size: 14px;">SUKUN KURNIAWAN, S.T., M.M.</p>
                <p class="text-muted small mb-0">Pembina</p>
                <p class="small mb-0" style="margin-top: -3px;">NIP. 19780217 200502 1 001</p>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection