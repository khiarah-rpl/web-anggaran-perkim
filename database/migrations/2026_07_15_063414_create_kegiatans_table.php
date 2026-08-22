@extends('layouts.app') 

@section('content')
<div class="container" style="padding: 20px;">

    <!-- Tombol Tambah yang selalu muncul di luar kertas -->
    <a href="{{ route('kegiatan.create') }}" class="btn btn-success" style="background:#28a745; color:white; padding:10px; text-decoration:none; display:inline-block; margin-bottom: 20px;">
        + Tambah Kegiatan
    </a>

    <!-- Area Kertas -->
    <div style="background: white; padding: 40px; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        
        <div style="text-align: center; border-bottom: 3px solid black; margin-bottom: 20px;">
            <h3>PEMERINTAH KABUPATEN MUSI BANYUASIN</h3>
            <h4>DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN</h4>
        </div>

        <table border="1" style="width: 100%; border-collapse: collapse; font-size: 13px;">
            <tr style="background:#f2f2f2;">
                <th>No</th>
                <th>No DPA</th>
                <th>Nama Kegiatan</th>
                <th>Kegiatan/Sub Kegiatan</th>
                <th>Aksi</th>
            </tr>
            @foreach($kegiatans as $k)
            <tr>
                <td style="padding: 8px;">{{ $loop->iteration }}</td>
                <td style="padding: 8px;">{{ $k->nomor_tanggal_dpa }}</td>
                <td style="padding: 8px;">{{ $k->program_kegiatan }}</td>
                <td style="padding: 8px;">{{ $k->sub_kegiatan }}</td>
                <td style="padding: 8px;">
                    <a href="{{ route('kegiatan.edit', $k->id) }}">Edit 25 Poin</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection