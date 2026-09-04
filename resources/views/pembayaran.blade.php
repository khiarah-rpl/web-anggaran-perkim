@extends('layouts.app')

@section('content')

<div class="container-fluid px-0">

    <!-- HEADER -->
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


    <!-- REKAP PEMBAYARAN -->
    <div class="row g-3 mb-4">

        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-3 bg-white p-3">

                <small class="text-muted fw-semibold">
                    Total Transaksi
                </small>

                <h3 class="fw-bold text-dark mb-0 mt-1">
                    {{ $kegiatans->total() }}
                </h3>

                <small class="text-muted">
                    Data pembayaran
                </small>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-3 bg-white p-3">

                <small class="text-muted fw-semibold">
                    Total Nilai Pembayaran
                </small>

                <h3 class="fw-bold text-success mb-0 mt-1">
                    Rp {{ number_format(
                        $kegiatans->sum('total_pembayaran'),
                        0,
                        ',',
                        '.'
                    ) }}
                </h3>

                <small class="text-muted">
                    Halaman saat ini
                </small>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card border-0 shadow-sm rounded-3 bg-white p-3">

                <small class="text-muted fw-semibold">
                    Status
                </small>

                <h3 class="fw-bold text-success mb-0 mt-1">
                    Aktif
                </h3>

                <small class="text-muted">
                    Data pembayaran
                </small>

            </div>

        </div>

    </div>


    <!-- DAFTAR TRANSAKSI -->
    <div class="card border-0 shadow-sm rounded-3 bg-white p-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">

            <div>
                <h6 class="fw-bold text-success mb-1">

                    <i class="fa-solid fa-money-check-dollar me-2"></i>

                    Daftar Transaksi Pembayaran Terbaru

                </h6>

                <small class="text-muted">
                    Data berdasarkan nilai pembayaran yang tersimpan.
                </small>
            </div>


            <!-- PENCARIAN -->
            <form
                action="{{ url('/pembayaran') }}"
                method="GET"
                class="d-flex"
            >

                <input
                    type="text"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    class="form-control form-control-sm me-2"
                    style="min-width: 240px;"
                    placeholder="Cari pembayaran..."
                >

                <button
                    type="submit"
                    class="btn btn-success btn-sm"
                >
                    <i class="fa-solid fa-search"></i>
                </button>

            </form>

        </div>


        <!-- TABEL -->
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr
                        class="text-uppercase text-muted"
                        style="
                            font-size: 11px;
                            letter-spacing: 0.5px;
                            border-bottom: 2px solid #dee2e6;
                        "
                    >

                        <th style="width: 5%;">
                            No
                        </th>

                        <th style="width: 15%;">
                            Kode / No SPM
                        </th>

                        <th style="width: 35%;">
                            Nama Kegiatan
                        </th>

                        <th style="width: 15%;">
                            Termin / Tahap
                        </th>

                        <th style="width: 20%;">
                            Nilai Dicairkan
                        </th>

                        <th style="width: 10%;" class="text-center">
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($kegiatans as $index => $item)

                        <tr
                            style="
                                font-size: 13px;
                                border-top: 1px solid #dee2e6;
                            "
                        >

                            <!-- NO -->
                            <td class="fw-bold text-secondary">

                                {{ $kegiatans->firstItem() + $index }}

                            </td>


                            <!-- NO SPM -->
                            <td class="fw-semibold text-secondary">

                                @if($item->no_spm)

                                    <span class="badge bg-success">
                                        {{ $item->no_spm }}
                                    </span>

                                @else

                                    -

                                @endif

                            </td>


                            <!-- NAMA KEGIATAN -->
                            <td class="fw-semibold text-dark">

                                {{ \Illuminate\Support\Str::limit(
                                    $item->program_kegiatan ?? '-',
                                    60
                                ) }}

                                @if($item->sub_kegiatan)

                                    <div class="text-muted small mt-1">

                                        {{ \Illuminate\Support\Str::limit(
                                            $item->sub_kegiatan,
                                            70
                                        ) }}

                                    </div>

                                @endif

                            </td>


                            <!-- TERMIN -->
                            <td class="text-muted">

                                @if($item->termin1 || $item->fisik1)

                                    Termin 1

                                @elseif($item->termin2 || $item->fisik2)

                                    Termin 2

                                @else

                                    Pembayaran

                                @endif

                            </td>


                            <!-- NILAI -->
                            <td class="text-success fw-bold">

                                Rp
                                {{ number_format(
                                    $item->total_pembayaran ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                                @if(
                                    ($item->total_pembayaran ?? 0) == 0 &&
                                    ($item->nilai_spm ?? 0) > 0
                                )

                                    <div class="text-muted small">
                                        SPM:
                                        Rp
                                        {{ number_format(
                                            $item->nilai_spm,
                                            0,
                                            ',',
                                            '.'
                                        ) }}
                                    </div>

                                @endif

                            </td>


                            <!-- STATUS -->
                            <td class="text-center">

                                <span
                                    class="badge bg-success px-3 py-2 rounded-2"
                                    style="font-size: 10px;"
                                >
                                    Lunas
                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5"
                            >

                                <div class="text-muted opacity-50 mb-3">

                                    <i class="fa-solid fa-receipt fa-3x"></i>

                                </div>

                                <h6 class="fw-bold text-muted">
                                    Belum ada transaksi pembayaran
                                </h6>

                                <p class="text-muted small mb-0">

                                    Belum ada data pembayaran yang tersimpan
                                    di database.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- PAGINATION -->
        @if($kegiatans->hasPages())

            <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">

                <small class="text-muted">

                    Menampilkan
                    <strong>{{ $kegiatans->firstItem() }}</strong>
                    -
                    <strong>{{ $kegiatans->lastItem() }}</strong>
                    dari
                    <strong>{{ $kegiatans->total() }}</strong>
                    data

                </small>


                <div>

                    {{ $kegiatans->links() }}

                </div>

            </div>

        @endif

    </div>

</div>

@endsection