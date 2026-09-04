@extends('layouts.app')

@section('content')

<div class="container-fluid px-0">

    <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h3 class="fw-bold text-dark mb-1">
                    <i class="fa-solid fa-money-check-dollar text-success me-2"></i>
                    Manajemen Pembayaran Kontrak
                </h3>

                <p class="text-muted small mb-0">
                    Realisasi pencairan termin dan pelunasan dana belanja dinas.
                </p>
            </div>

            <a href="{{ url('/dashboard') }}"
               class="btn btn-outline-success rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-2"></i>
                Kembali
            </a>

        </div>

    </div>


    <div class="card border-0 shadow-sm rounded-3 bg-white p-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>
                <h6 class="fw-bold text-success mb-1">
                    <i class="fa-solid fa-money-check-dollar me-2"></i>
                    Daftar Transaksi Pembayaran
                </h6>

                <small class="text-muted">
                    Data pembayaran dari tabel kegiatan.
                </small>
            </div>

            <form action="{{ url('/pembayaran') }}" method="GET" class="d-flex">

                <input
                    type="text"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    class="form-control form-control-sm me-2"
                    style="width: 250px;"
                    placeholder="Cari pembayaran..."
                >

                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-search me-1"></i>
                    Cari
                </button>

            </form>

        </div>


        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr
                        class="text-uppercase text-muted"
                        style="font-size:11px;"
                    >
                        <th>No</th>
                        <th>No. SPM</th>
                        <th>Nama Kegiatan</th>
                        <th>Kontraktor</th>
                        <th>No. SPK</th>
                        <th>Nilai Pembayaran</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($kegiatans as $index => $item)

                        <tr style="font-size:13px;">

                            <td class="fw-bold">
                                {{ $kegiatans->firstItem() + $index }}
                            </td>

                            <td>
                                {{ $item->no_spm ?? '-' }}
                            </td>

                            <td class="fw-semibold">
                                {{ $item->program_kegiatan ?? '-' }}

                                @if($item->sub_kegiatan)
                                    <div class="small text-muted">
                                        {{ $item->sub_kegiatan }}
                                    </div>
                                @endif
                            </td>

                            <td>
                                {{ $item->nama_kontraktor ?? '-' }}
                            </td>

                            <td>
                                {{ $item->no_spk ?? '-' }}
                            </td>

                            <td class="fw-bold text-success">
                                Rp {{ number_format(
                                    $item->total_pembayaran ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </td>

                            <td class="text-center">

                                <span class="badge bg-success">
                                    Lunas
                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <i class="fa-solid fa-receipt fa-3x text-muted opacity-50 mb-3"></i>

                                <p class="text-muted mb-0">
                                    Belum ada transaksi pembayaran.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($kegiatans->hasPages())

            <div class="mt-3">
                {{ $kegiatans->withQueryString()->links() }}
            </div>

        @endif

    </div>

</div>

@endsection