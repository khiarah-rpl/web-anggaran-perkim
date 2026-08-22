@extends('layouts.app')

@section('content')
<div class="mb-4">
    <h4 class="fw-bold text-dark mb-1">Sistem Informasi Pengelolaan Kontrak dan SPM</h4>
    <p class="text-muted small">Dinas Perumahan & Kawasan Permukiman Kabupaten Musi Banyuasin</p>
</div>

<!-- SECTION 1: CARD RINGKASAN DATA REAL-TIME -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 bg-white border-start border-primary border-4 rounded-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted fw-bold d-block mb-1">Total Kontrak</small>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totalKontrak ?? 0 }}</h3>
                    <small class="text-primary small fw-semibold"><i class="fa-solid fa-arrow-up me-1"></i>Kontrak Aktif</small>
                </div>
                <div class="p-3 bg-light-blue rounded-3 text-primary"><i class="fa-solid fa-file-signature fs-4"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 bg-white border-start border-success border-4 rounded-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted fw-bold d-block mb-1">Total Kegiatan</small>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totalKegiatan ?? 0 }}</h3>
                    <small class="text-success small fw-semibold"><i class="fa-solid fa-arrow-up me-1"></i>Kegiatan Terdata</small>
                </div>
                <div class="p-3 bg-light-green rounded-3 text-success"><i class="fa-solid fa-list-check fs-4"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 bg-white border-start border-warning border-4 rounded-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted fw-bold d-block mb-1">Total SPM</small>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totalSpm ?? 0 }}</h3>
                    <small class="text-warning small fw-semibold"><i class="fa-solid fa-arrow-up me-1"></i>SPM Diajukan</small>
                </div>
                <div class="p-3 bg-light-warning rounded-3 text-warning"><i class="fa-solid fa-file-invoice-dollar fs-4"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-3 bg-white border-start border-4 rounded-3" style="border-left-color: #a855f7 !important;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted fw-bold d-block mb-1">Total Pembayaran</small>
                    <h3 class="fw-bold mb-0 text-dark">{{ $totalPembayaran ?? 0 }}</h3>
                    <small class="text-purple small fw-semibold" style="color: #a855f7;"><i class="fa-solid fa-arrow-up me-1"></i>Pembayaran Selesai</small>
                </div>
                <div class="p-3 bg-light-purple rounded-3" style="color: #a855f7;"><i class="fa-solid fa-credit-card fs-4"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 2: TABEL DINAMIS DENGAN TOMBOL AKSI KESALAHAN DATA -->
<div class="row g-4 mb-4">
    <!-- Tabel SPM -->
    <div class="col-md-5">
        <div class="card border-0 shadow-sm p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-file-lines text-success me-2"></i>SPM Terbaru</h6>
                <a href="#" class="btn btn-sm btn-light border text-muted px-2 py-1 small">Lihat Semua</a>
            </div>
            <table class="table table-hover align-middle mb-0" style="font-size: 0.8rem;">
                <thead class="table-light">
                    <tr>
                        <th>NO</th>
                        <th>NO SPM</th>
                        <th>KEGIATAN</th>
                        <th>NILAI</th>
                        <th>STATUS</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($allData ?? [] as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-muted">SPM/0{{ $data->id }}/VIII/2026</td>
                            <td>{{ $data->nama_kegiatan ?? $data->kegiatan }}</td>
                            <td class="fw-bold text-success">Rp {{ number_format($data->nilai_kontrak ?? 0, 0, ',', '.') }}</td>
                            <td><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1">Selesai</span></td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ url('/kegiatan/'.$data->id.'/edit') }}" class="btn btn-sm btn-warning text-white py-0 px-2" title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square" style="font-size: 0.75rem;"></i>
                                    </a>
                                    <form action="{{ url('/kegiatan/'.$data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger py-0 px-2" title="Hapus Data">
                                            <i class="fa-solid fa-trash" style="font-size: 0.75rem;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Belum ada data kegiatan yang diinput kantor.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tabel Pembayaran -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0 text-dark"><i class="fa-solid fa-money-bill-transfer text-success me-2"></i>Pembayaran Terbaru</h6>
                <a href="#" class="btn btn-sm btn-light border text-muted px-2 py-1 small">Lihat Semua</a>
            </div>
            <table class="table table-hover align-middle mb-0" style="font-size: 0.8rem;">
                <thead class="table-light">
                    <tr><th>NO</th><th>NO BAYAR</th><th>KEGIATAN</th><th>NILAI</th></tr>
                </thead>
                <tbody>
                    @forelse($allData ?? [] as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-muted">PMB/0{{ $data->id }}/VIII/2026</td>
                            <td>{{ $data->nama_kegiatan ?? $data->kegiatan }}</td>
                            <td class="fw-bold text-primary">Rp {{ number_format($data->nilai_kontrak ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-muted py-4">Belum ada transaksi pembayaran.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Kalender Kerja -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm p-4 bg-white h-100">
            <h6 class="fw-bold mb-3 text-dark"><i class="fa-solid fa-calendar-days text-success me-2"></i>Kalender Kerja</h6>
            <div class="p-2 border rounded-3 bg-light text-center mb-2">
                <h6 class="fw-bold text-success mb-1">Juli 2026</h6>
                <small class="text-muted small">Jadwal Peninjauan Lapangan Aktif</small>
            </div>
            <div class="alert alert-success p-2 mb-0" style="font-size: 0.75rem;">
                <i class="fa-solid fa-circle-info me-1"></i> Sistem berjalan normal memantau database internal.
            </div>
        </div>
    </div>
</div>
@endsection