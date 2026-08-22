@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="card border-0 shadow-sm rounded-3 bg-white p-4">
        
        <h3 class="fw-bold text-dark mb-1">Kalender Agenda & Batas Waktu</h3>
        <p class="text-muted small mb-4">Jadwal batas pelaksanaan kontrak pekerjaan dan pengajuan berkas dinas.</p>

        <!-- KOTAK UTAMA AGENDA -->
        <div class="border rounded-3 bg-white p-4">
            <h5 class="text-success fw-bold text-center mb-4"><i class="fa-solid fa-calendar-check me-2"></i>Jadwal Agenda Aktif Periode 2026</h5>

            <div class="d-flex flex-column gap-3">
                @php
                    // Filter hanya mengambil data yang memiliki tanggal_spm atau tanggal input dari database
                    $agendaData = $allData->filter(function($item) {
                        return !empty($item->tanggal_spm) || !empty($item->created_at);
                    });
                @endphp

                @forelse($agendaData as $item)
                    @php
                        // Prioritaskan tanggal_spm, jika kosong gunakan tanggal_input (created_at)
                        $tanggal = $item->tanggal_spm ?: $item->created_at;
                    @endphp
                    <div class="alert alert-success border-0 shadow-sm rounded-3 d-flex align-items-center mb-0" style="background-color: #e8f5e9; color: #1b5e20;">
                        <i class="fa-solid fa-calendar-day fa-lg me-3"></i>
                        <div>
                            <strong>{{ \Carbon\Carbon::parse($tanggal)->format('d F Y') }}:</strong> Batas Pelaksanaan / Agenda Realisasi SPM untuk pekerjaan <strong>{{ $item->kegiatan }}</strong>.
                        </div>
                    </div>
                @empty
                    <!-- TAMPILAN JIKA BELUM ADA DATA SAMA SEKALI -->
                    <div class="text-center py-5">
                        <div class="text-muted opacity-50 mb-3">
                            <i class="fa-solid fa-calendar-xmark fa-3x"></i>
                        </div>
                        <p class="text-muted small mb-0">Belum ada agenda aktif terisi. Silakan klik menu <strong>Data Kegiatan (Uraian)</strong> di sidebar kiri untuk mengisi data database.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection