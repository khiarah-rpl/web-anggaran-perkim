@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="card border-0 shadow-sm rounded-3 bg-white p-4">
        
        <h3 class="fw-bold text-dark mb-1">Manajemen Pembayaran Kontrak</h3>
        <p class="text-muted small mb-4">Realisasi pencairan termin dan pelunasan dana belanja dinas.</p>

        <!-- DAFTAR TRANSAKSI -->
        <div class="border rounded-3 bg-white p-4 shadow-xs">
            <h6 class="fw-bold text-success mb-3"><i class="fa-solid fa-money-check-dollar me-2"></i>Daftar Transaksi Pembayaran Terbaru</h6>
            
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-uppercase text-muted" style="font-size: 11px; letter-spacing: 0.5px; border-bottom: 2px solid #dee2e6;">
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Kode Bayar</th>
                            <th style="width: 45%;">Nama Kegiatan</th>
                            <th style="width: 15%;">Termin/Tahap</th>
                            <th style="width: 10%;">Nilai Dicairkan</th>
                            <th style="width: 10%;" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Filter hanya baris data yang memiliki nilai pencairan SPM
                            $pembayaranData = $allData->filter(function($item) {
                                return $item->nilai_spm > 0;
                            });
                        @endphp

                        @forelse($pembayaranData as $index => $item)
                        <tr style="font-size: 13px; border-top: 1px solid #dee2e6;">
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold text-secondary">PMB-2026-0{{ sprintf('%02d', $index + 1) }}</td>
                            <td class="fw-semibold text-dark">{{ $item->kegiatan }}</td>
                            <td class="text-muted">Termin Utama (100%)</td>
                            <td class="text-success fw-bold">Rp {{ number_format($item->nilai_spm, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="badge bg-success px-3 py-2 rounded-2" style="font-size: 10px;">Lunas</span>
                            </td>
                        </tr>
                        @empty
                        <!-- TAMPILAN JIKA BELUM ADA DATA SAMA SEKALI -->
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted opacity-50 mb-3">
                                    <i class="fa-solid fa-receipt fa-3x"></i>
                                </div>
                                <p class="text-muted small mb-0">Belum ada transaksi pembayaran. Silakan klik menu <strong>Data Kegiatan (Uraian)</strong> di sidebar kiri untuk mengisi data database.</p>
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