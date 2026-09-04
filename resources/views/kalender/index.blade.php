@extends('layouts.app')

@section('content')

<div class="container-fluid px-0">

    <!-- HEADER -->
    <div class="card border-0 shadow-sm rounded-3 bg-white p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h3 class="fw-bold text-dark mb-1">
                    <i class="fa-solid fa-calendar-days text-success me-2"></i>
                    Kalender Kegiatan
                </h3>

                <p class="text-muted small mb-0">
                    Jadwal pelaksanaan kegiatan, kontrak, dan pekerjaan Dinas Perumahan & Kawasan Permukiman.
                </p>
            </div>

            <a href="{{ url('/dashboard') }}"
               class="btn btn-outline-success rounded-pill px-4">

                <i class="fa-solid fa-arrow-left me-2"></i>
                Kembali

            </a>

        </div>

    </div>


    <!-- RINGKASAN -->
    <div class="row g-3 mb-4">

        <!-- TOTAL KEGIATAN -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted fw-semibold">
                            Total Kegiatan
                        </small>

                        <h3 class="fw-bold text-dark mb-0 mt-1">
                            {{ $kegiatans->count() }}
                        </h3>

                        <small class="text-muted">
                            Data kegiatan
                        </small>
                    </div>

                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-3">
                        <i class="fa-solid fa-list-check fa-xl"></i>
                    </div>

                </div>

            </div>
        </div>


        <!-- DENGAN TANGGAL MULAI -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted fw-semibold">
                            Ada Tanggal Mulai
                        </small>

                        <h3 class="fw-bold text-primary mb-0 mt-1">
                            {{ $kegiatans->filter(function ($item) {
                                return !empty($item->tgl_mulai);
                            })->count() }}
                        </h3>

                        <small class="text-muted">
                            Kegiatan terjadwal
                        </small>
                    </div>

                    <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3">
                        <i class="fa-solid fa-calendar-plus fa-xl"></i>
                    </div>

                </div>

            </div>
        </div>


        <!-- SEDANG BERJALAN -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted fw-semibold">
                            Sedang Berjalan
                        </small>

                        @php
                            $hariIni = now()->startOfDay();

                            $sedangBerjalan = $kegiatans->filter(function ($item) use ($hariIni) {

                                if (!$item->tgl_mulai) {
                                    return false;
                                }

                                $mulai = \Carbon\Carbon::parse($item->tgl_mulai)->startOfDay();

                                $selesai = $item->tgl_selesai
                                    ? \Carbon\Carbon::parse($item->tgl_selesai)->endOfDay()
                                    : null;

                                if ($selesai) {
                                    return $hariIni->between($mulai, $selesai);
                                }

                                return $hariIni->greaterThanOrEqualTo($mulai);

                            })->count();
                        @endphp

                        <h3 class="fw-bold text-warning mb-0 mt-1">
                            {{ $sedangBerjalan }}
                        </h3>

                        <small class="text-muted">
                            Berdasarkan tanggal
                        </small>
                    </div>

                    <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3">
                        <i class="fa-solid fa-spinner fa-xl"></i>
                    </div>

                </div>

            </div>
        </div>


        <!-- SELESAI -->
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 bg-white p-3 h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <small class="text-muted fw-semibold">
                            Telah Selesai
                        </small>

                        @php
                            $selesai = $kegiatans->filter(function ($item) use ($hariIni) {

                                if (!$item->tgl_selesai) {
                                    return false;
                                }

                                return \Carbon\Carbon::parse($item->tgl_selesai)
                                    ->startOfDay()
                                    ->lessThan($hariIni);

                            })->count();
                        @endphp

                        <h3 class="fw-bold text-success mb-0 mt-1">
                            {{ $selesai }}
                        </h3>

                        <small class="text-muted">
                            Berdasarkan tanggal selesai
                        </small>
                    </div>

                    <div class="bg-success bg-opacity-10 text-success p-3 rounded-3">
                        <i class="fa-solid fa-circle-check fa-xl"></i>
                    </div>

                </div>

            </div>
        </div>

    </div>


    <!-- DAFTAR JADWAL -->
    <div class="card border-0 shadow-sm rounded-3 bg-white p-4">

        <!-- JUDUL -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

            <div>

                <h6 class="fw-bold text-success mb-1">

                    <i class="fa-solid fa-calendar-check me-2"></i>
                    Jadwal Pelaksanaan Kegiatan

                </h6>

                <small class="text-muted">
                    Daftar kegiatan berdasarkan tanggal mulai dan tanggal selesai.
                </small>

            </div>


            <!-- PENCARIAN SISI CLIENT -->
            <div style="min-width: 250px;">

                <div class="input-group">

                    <span class="input-group-text bg-white">
                        <i class="fa-solid fa-search text-success"></i>
                    </span>

                    <input
                        type="text"
                        id="searchKalender"
                        class="form-control"
                        placeholder="Cari kegiatan..."
                    >

                </div>

            </div>

        </div>


        <!-- TABEL -->
        <div class="table-responsive">

            <table class="table table-hover align-middle"
                   id="tabelKalender">

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

                        <th style="width: 30%;">
                            Nama Kegiatan
                        </th>

                        <th style="width: 18%;">
                            Kontraktor
                        </th>

                        <th style="width: 15%;">
                            Mulai
                        </th>

                        <th style="width: 15%;">
                            Selesai
                        </th>

                        <th style="width: 10%;">
                            Status
                        </th>

                        <th style="width: 7%;" class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody id="kalenderBody">

                    @forelse($kegiatans as $index => $item)

                        @php

                            $tanggalMulai = $item->tgl_mulai
                                ? \Carbon\Carbon::parse($item->tgl_mulai)
                                : null;

                            $tanggalSelesai = $item->tgl_selesai
                                ? \Carbon\Carbon::parse($item->tgl_selesai)
                                : null;

                            $status = 'Belum Dijadwalkan';

                            $statusClass = 'secondary';

                            if ($tanggalMulai) {

                                if ($tanggalSelesai && $hariIni->greaterThan($tanggalSelesai->endOfDay())) {

                                    $status = 'Selesai';
                                    $statusClass = 'success';

                                } elseif ($hariIni->greaterThanOrEqualTo($tanggalMulai->startOfDay()) &&
                                          (!$tanggalSelesai || $hariIni->lessThanOrEqualTo($tanggalSelesai->endOfDay()))) {

                                    $status = 'Berjalan';
                                    $statusClass = 'warning';

                                } elseif ($hariIni->lessThan($tanggalMulai->startOfDay())) {

                                    $status = 'Akan Datang';
                                    $statusClass = 'primary';

                                }
                            }

                        @endphp


                        <tr class="baris-kalender" style="font-size: 13px;">

                            <!-- NO -->
                            <td class="fw-bold text-secondary">

                                {{ $index + 1 }}

                            </td>


                            <!-- KEGIATAN -->
                            <td>

                                <div class="fw-semibold text-dark">

                                    {{ \Illuminate\Support\Str::limit(
                                        $item->program_kegiatan ?? '-',
                                        70
                                    ) }}

                                </div>

                                @if(!empty($item->sub_kegiatan))

                                    <div class="text-muted small mt-1">

                                        {{ \Illuminate\Support\Str::limit(
                                            $item->sub_kegiatan,
                                            80
                                        ) }}

                                    </div>

                                @endif

                            </td>


                            <!-- KONTRAKTOR -->
                            <td>

                                {{ \Illuminate\Support\Str::limit(
                                    $item->nama_kontraktor ?? '-',
                                    35
                                ) }}

                            </td>


                            <!-- TANGGAL MULAI -->
                            <td>

                                @if($tanggalMulai)

                                    <span class="fw-semibold">

                                        {{ $tanggalMulai->format('d/m/Y') }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            <!-- TANGGAL SELESAI -->
                            <td>

                                @if($tanggalSelesai)

                                    <span class="fw-semibold">

                                        {{ $tanggalSelesai->format('d/m/Y') }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            <!-- STATUS -->
                            <td>

                                <span class="badge bg-{{ $statusClass }}">

                                    {{ $status }}

                                </span>

                            </td>


                            <!-- AKSI -->
                            <td class="text-center">

                                <a
                                    href="{{ url('/kegiatan/' . $item->id) }}"
                                    class="btn btn-sm btn-outline-success rounded-circle"
                                    title="Lihat Detail"
                                >

                                    <i class="fa-solid fa-eye"></i>

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-5">

                                <div class="text-muted opacity-50 mb-3">

                                    <i class="fa-solid fa-calendar-xmark fa-3x"></i>

                                </div>

                                <h6 class="fw-bold text-muted">

                                    Belum Ada Data Kegiatan

                                </h6>

                                <p class="text-muted small mb-0">

                                    Belum ada data kegiatan yang tersedia.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- PESAN HASIL PENCARIAN -->
        <div
            id="hasilTidakDitemukan"
            class="text-center py-4 d-none"
        >

            <i class="fa-solid fa-magnifying-glass fa-2x text-muted opacity-50 mb-2"></i>

            <p class="text-muted mb-0">
                Data kegiatan tidak ditemukan.
            </p>

        </div>

    </div>

</div>


<!-- SCRIPT PENCARIAN -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchKalender');
    const rows = document.querySelectorAll('.baris-kalender');
    const notFound = document.getElementById('hasilTidakDitemukan');

    if (!searchInput) {
        return;
    }

    searchInput.addEventListener('keyup', function () {

        const keyword = this.value.toLowerCase().trim();

        let jumlahTampil = 0;

        rows.forEach(function (row) {

            const text = row.innerText.toLowerCase();

            if (text.includes(keyword)) {

                row.style.display = '';

                jumlahTampil++;

            } else {

                row.style.display = 'none';

            }

        });


        if (keyword !== '' && jumlahTampil === 0) {

            notFound.classList.remove('d-none');

        } else {

            notFound.classList.add('d-none');

        }

    });

});

</script>

@endsection