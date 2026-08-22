@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold text-dark mb-1">Daftar Rekapitulasi Kegiatan (1-25)</h4>
        <p class="text-muted small">Dinas Perumahan & Kawasan Permukiman Kabupaten Musi Banyuasin</p>
    </div>
    <!-- Div penutup tombol sudah diperbaiki di sini -->
    <div class="d-flex gap-2"> 
        <a href="{{ route('kegiatan.cetakSemua') }}" target="_blank" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-print me-2"></i>Print Semua
        </a>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-success shadow-sm">
            <i class="fa-solid fa-plus me-2"></i>Tambah Kegiatan
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm p-4 bg-white">
    <div style="background: white; padding: 20px;">
        <div style="text-align: center; border-bottom: 3px solid #000; margin-bottom: 25px; padding-bottom: 10px;">
            <h5 class="fw-bold">PEMERINTAH KABUPATEN MUSI BANYUASIN</h5>
            <h6 class="fw-bold">DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</h6>
        </div>

        <table class="table table-bordered align-middle" style="font-size: 0.85rem;">
            <thead class="table-light">
                <tr>
                    <th style="width: 5%;">NO</th>
                    <th style="width: 15%;">NO DPA</th>
                    <th style="width: 30%;">NAMA/NOMOR KEGIATAN</th>
                    <th style="width: 30%;">KEGIATAN/SUB KEGIATAN</th>
                    <th class="text-center" style="width: 20%;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                {{-- Gunakan take(25) untuk membatasi tampilan layar jadi 25 saja --}}
                @forelse($kegiatans->take(25) as $key => $k)
                <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $k->nomor_tanggal_dpa }}</td>
                    <td>{{ $k->program_kegiatan }}</td>
                    <td>{{ $k->sub_kegiatan }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('kegiatan.edit', $k->id) }}" class="btn btn-sm btn-warning text-white">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('kegiatan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-muted">Data belum tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection