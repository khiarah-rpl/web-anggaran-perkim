@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-3">

    <!-- 1. BAGIAN CARD INFORMASI UTAMA (STATS) -->
    <div class="row g-3 mb-4">
        <!-- Total Kontrak -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-radius: 12px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small fw-semibold">Total Kontrak</span>
                        <h3 class="fw-bold text-dark mt-1 mb-0">{{ $total_kontrak ?? '1' }}</h3>
                        <span class="text-success small fw-bold mt-1 d-inline-block">
                            <i class="fa-solid fa-arrow-trend-up me-1"></i> Terus bertambah
                        </span>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3">
                        <i class="fa-solid fa-file-contract fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total SPK -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-radius: 12px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small fw-semibold">Total SPK</span>
                        <h3 class="fw-bold text-dark mt-1 mb-0">{{ $total_spk ?? '1' }}</h3>
                        <span class="text-success small fw-bold mt-1 d-inline-block">
                            <i class="fa-solid fa-circle-check me-1"></i> Aktif
                        </span>
                    </div>
                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-3">
                        <i class="fa-solid fa-file-signature fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nilai Kontrak -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-radius: 12px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small fw-semibold">Nilai Kontrak</span>
                        <h3 class="fw-bold text-dark mt-1 mb-0">Rp {{ number_format($total_nilai_kontrak ?? 397439000, 0, ',', '.') }}</h3>
                        <span class="text-warning small fw-bold mt-1 d-inline-block">
                            <i class="fa-solid fa-coins me-1"></i> Akumulasi
                        </span>
                    </div>
                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3">
                        <i class="fa-solid fa-wallet fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total SPM -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 p-3" style="border-radius: 12px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="text-muted small fw-semibold">Total SPM</span>
                        <h3 class="fw-bold text-dark mt-1 mb-0">{{ $total_spm ?? '1' }}</h3>
                        <span class="text-primary small fw-bold mt-1 d-inline-block">
                            <i class="fa-solid fa-print me-1"></i> Diterbitkan
                        </span>
                    </div>
                    <div class="bg-purple bg-opacity-10 text-purple p-3 rounded-3" style="color: #6b21a8; background-color: #faf5ff;">
                        <i class="fa-solid fa-receipt fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. FITUR PENCARIAN & FILTER SPESIFIK -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
        <div class="card-body p-4">
            <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-magnifying-glass me-2 text-primary"></i> Pencarian & Filter Spesifik</h6>
            <form action="{{ route('kontrak.index') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-semibold">No SPK / Kontrak</label>
                        <input type="text" name="no_spk" class="form-control form-control-custom" value="{{ request('no_spk') }}" placeholder="Masukkan No SPK...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-semibold">Nama Kontraktor</label>
                        <input type="text" name="nama_kontraktor" class="form-control form-control-custom" value="{{ request('nama_kontraktor') }}" placeholder="Nama Kontraktor...">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-semibold">No SPM</label>
                        <input type="text" name="no_spm" class="form-control form-control-custom" value="{{ request('no_spm') }}" placeholder="Masukkan No SPM...">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm" style="border-radius: 8px;">
                            <i class="fa-solid fa-search me-1"></i> Cari Data
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- 3. TABEL LOG PENGAWASAN ANGGARAN & SPM -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center" style="border-radius: 12px 12px 0 0;">
            <div>
                <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clipboard-list text-primary me-2"></i> Log Pengawasan Anggaran & SPM</h5>
                <p class="text-muted small mb-0 mt-1">Gunakan tombol Aksi di sebelah kanan untuk melihat rincian 25 poin kegiatan, mengedit, atau menghapus data.</p>
            </div>
            <!-- Ganti dari kontrak.create menjadi kegiatan.create -->
<a href="{{ route('kegiatan.create') }}" class="btn btn-primary">
    <i class="fa fa-plus"></i> Tambah Kegiatan
</a>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead class="table-light text-secondary">
                        <tr class="small text-uppercase fw-bold">
                            <th class="text-center py-3" style="width: 5%;">No</th>
                            <th style="width: 15%;">No / Tgl SPM</th>
                            <th style="width: 15%;">No SPK / Kontrak</th>
                            <th style="width: 25%;">Nama Kegiatan</th>
                            <th style="width: 15%;">Kontraktor</th>
                            <th class="text-end" style="width: 10%;">Nilai Kontrak</th>
                            <th class="text-end" style="width: 10%;">Pencairan SPM</th>
                            <th class="text-center" style="width: 10%;">Status Pagu</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kontraks as $index => $kontrak)
                        <tr>
                            <td class="text-center fw-bold text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $kontrak->no_spm ?? '-' }}</div>
                                <small class="text-muted">{{ $kontrak->tgl_spm ? \Carbon\Carbon::parse($kontrak->tgl_spm)->translatedFormat('d F Y') : '-' }}</small>
                            </td>
                            <td class="fw-semibold text-secondary">{{ $kontrak->no_spk ?? '-' }}</td>
                            <td>
                                <div class="text-truncate-2" title="{{ $kontrak->nama_kegiatan }}">
                                    {{ Str::limit($kontrak->nama_kegiatan, 80) }}
                                </div>
                            </td>
                            <td class="fw-semibold text-dark">{{ $kontrak->nama_kontraktor ?? '-' }}</td>
                            <td class="text-end fw-bold text-dark">
                                Rp {{ number_format($kontrak->nilai_kontrak ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="text-end fw-bold text-success">
                                Rp {{ number_format($kontrak->nilai_spm ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                @if(($kontrak->nilai_spm ?? 0) > ($kontrak->nilai_kontrak ?? 0))
                                    <span class="badge bg-danger px-2 py-2 rounded-pill small">Over Pagu</span>
                                @else
                                    <span class="badge bg-success px-2 py-2 rounded-pill small">Aman</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <!-- Detail (Lihat 25 Poin Uraian) -->
                                    <a href="{{ route('kontrak.show', $kontrak->id) }}" class="btn btn-sm btn-info text-white px-2 py-1" title="Lihat Detail Uraian">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <!-- Edit -->
                                    <a href="{{ route('kontrak.edit', $kontrak->id) }}" class="btn btn-sm btn-warning text-white px-2 py-1" title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <!-- Hapus -->
                                    <form action="{{ route('kontrak.destroy', $kontrak->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data kontrak ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-2 py-1" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <!-- Jika Data Masih Kosong, Munculkan Animasi Map Kosong Persis Seperti Desain Kamu -->
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="py-4">
                                    <img src="{{ asset('images/empty-folder.png') }}" class="mb-3" style="width: 80px; opacity: 0.5;" alt="Empty">
                                    <h6 class="text-muted fw-bold">Tidak ada data kontrak atau SPM yang ditemukan.</h6>
                                    <p class="text-muted small">Silakan klik tombol "Tambah Kontrak Baru" untuk membuat data baru.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination / Halaman jika data banyak -->
            @if(isset($kontraks) && method_exists($kontraks, 'links'))
                <div class="card-footer bg-white py-3 border-top d-flex justify-content-end">
                    {{ $kontraks->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Styling Tambahan untuk Penyelarasan Desain Halus -->
<style>
    .form-control-custom {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.6rem 0.75rem;
        background-color: #f8fafc;
    }
    .form-control-custom:focus {
        background-color: #ffffff !important;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    }
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
    .table-hover tbody tr:hover {
        background-color: #f8fafc;
    }
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
    }
</style>
@endsection