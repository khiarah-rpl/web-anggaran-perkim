@extends('layouts.app')

@section('content')

<div class="container-fluid px-0">

    <!-- HEADER -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h4 class="fw-bold text-dark mb-1">
                        <i class="fa-solid fa-file-invoice-dollar text-success me-2"></i>
                        Laporan SPM
                    </h4>

                    <p class="text-muted mb-0 small">
                        Daftar Surat Perintah Membayar yang telah diinput.
                    </p>
                </div>

                <a href="{{ url('/dashboard') }}"
                   class="btn btn-outline-success rounded-pill px-4">
                    <i class="fa-solid fa-arrow-left me-2"></i>
                    Kembali
                </a>

            </div>

        </div>
    </div>


    <!-- PENCARIAN -->
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">

            <form action="{{ url('/laporan-spm') }}" method="GET">

                <div class="row g-2">

                    <div class="col-md-10">

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="fa-solid fa-magnifying-glass text-success"></i>
                            </span>

                            <input
                                type="text"
                                name="keyword"
                                value="{{ request('keyword') }}"
                                class="form-control"
                                placeholder="Cari nomor SPM, program kegiatan, kontraktor, nomor SPK..."
                            >

                        </div>

                    </div>

                    <div class="col-md-2">

                        <button
                            type="submit"
                            class="btn btn-success w-100"
                        >
                            <i class="fa-solid fa-search me-1"></i>
                            Cari
                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>


    <!-- JUMLAH DATA -->
    <div class="mb-3">

        <span class="text-muted small">
            Menampilkan
            <strong>{{ $kegiatans->total() }}</strong>
            data SPM
        </span>

    </div>


    <!-- TABEL -->
    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr class="text-uppercase text-muted"
                            style="font-size: 11px;">

                            <th class="px-3">
                                No
                            </th>

                            <th>
                                No. SPM
                            </th>

                            <th>
                                Tanggal SPM
                            </th>

                            <th>
                                Program / Kegiatan
                            </th>

                            <th>
                                Sub Kegiatan
                            </th>

                            <th>
                                Kontraktor
                            </th>

                            <th>
                                No. SPK
                            </th>

                            <th class="text-end">
                                Nilai Pembayaran
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kegiatans as $index => $item)

                            <tr>

                                <!-- NOMOR -->
                                <td class="px-3 fw-bold text-secondary">

                                    {{ $kegiatans->firstItem() + $index }}

                                </td>


                                <!-- NO SPM -->
                                <td>

                                    @if($item->no_spm)

                                        <span class="badge bg-success">
                                            {{ $item->no_spm }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <!-- TANGGAL SPM -->
                                <td>

                                    @if($item->tgl_spm)

                                        {{ \Carbon\Carbon::parse($item->tgl_spm)->format('d/m/Y') }}

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <!-- PROGRAM KEGIATAN -->
                                <td>

                                    <div class="fw-semibold text-dark">

                                        {{ \Illuminate\Support\Str::limit(
                                            $item->program_kegiatan ?? '-',
                                            55
                                        ) }}

                                    </div>

                                </td>


                                <!-- SUB KEGIATAN -->
                                <td>

                                    <span class="text-muted small">

                                        {{ \Illuminate\Support\Str::limit(
                                            $item->sub_kegiatan ?? '-',
                                            45
                                        ) }}

                                    </span>

                                </td>


                                <!-- KONTRAKTOR -->
                                <td>

                                    {{ \Illuminate\Support\Str::limit(
                                        $item->nama_kontraktor ?? '-',
                                        35
                                    ) }}

                                </td>


                                <!-- NO SPK -->
                                <td>

                                    {{ $item->no_spk ?? '-' }}

                                </td>


                                <!-- NILAI PEMBAYARAN -->
                                <td class="text-end">

                                    <span class="fw-bold text-success">

                                        Rp
                                        {{ number_format(
                                            $item->total_pembayaran ?? 0,
                                            0,
                                            ',',
                                            '.'
                                        ) }}

                                    </span>

                                </td>


                                <!-- AKSI -->
                                <td class="text-center">

                                    <a
                                        href="{{ url('/kegiatan/' . $item->id) }}"
                                        class="btn btn-sm btn-outline-success rounded-pill px-3"
                                    >

                                        <i class="fa-solid fa-eye me-1"></i>
                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="text-center py-5"
                                >

                                    <div class="text-muted opacity-50 mb-3">

                                        <i class="fa-solid fa-file-circle-xmark fa-3x"></i>

                                    </div>

                                    <h6 class="fw-bold text-muted">
                                        Belum ada data SPM
                                    </h6>

                                    <p class="text-muted small mb-0">

                                        Belum ada kegiatan yang memiliki
                                        nomor SPM.

                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- PAGINATION -->
        @if($kegiatans->hasPages())

            <div class="card-footer bg-white border-0 py-3">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                    <small class="text-muted">

                        Halaman
                        <strong>{{ $kegiatans->currentPage() }}</strong>
                        dari
                        <strong>{{ $kegiatans->lastPage() }}</strong>

                    </small>

                    <div>

                        {{ $kegiatans->links() }}

                    </div>

                </div>

            </div>

        @endif

    </div>

</div>

@endsection