@extends('layouts.app')

@section('content')

<div class="container" style="padding: 20px;">

    {{-- Tombol Tambah Kegiatan --}}
    <a href="{{ route('kegiatan.create') }}"
       class="btn btn-success"
       style="
            background:#28a745;
            color:white;
            padding:10px 18px;
            text-decoration:none;
            display:inline-block;
            margin-bottom:20px;
            border-radius:5px;
       ">
        + Tambah Kegiatan
    </a>


    {{-- Kertas / Tabel Utama --}}
    <div style="
        background:white;
        padding:40px;
        border:1px solid #ccc;
        box-shadow:0 0 10px rgba(0,0,0,0.1);
        overflow-x:auto;
    ">


        {{-- Kop --}}
        <div style="
            text-align:center;
            border-bottom:3px solid black;
            margin-bottom:20px;
            padding-bottom:10px;
        ">

            <h3 style="margin:0 0 5px 0;">
                PEMERINTAH KABUPATEN MUSI BANYUASIN
            </h3>

            <h4 style="margin:0;">
                DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN
            </h4>

            <p style="margin:8px 0 0 0; font-size:14px;">
                DATA KEGIATAN
            </p>

        </div>


        {{-- Pesan sukses --}}
        @if(session('success'))

            <div style="
                background:#d4edda;
                color:#155724;
                border:1px solid #c3e6cb;
                padding:12px;
                border-radius:5px;
                margin-bottom:20px;
            ">

                {{ session('success') }}

            </div>

        @endif


        {{-- Pesan error --}}
        @if(session('error'))

            <div style="
                background:#f8d7da;
                color:#721c24;
                border:1px solid #f5c6cb;
                padding:12px;
                border-radius:5px;
                margin-bottom:20px;
            ">

                {{ session('error') }}

            </div>

        @endif


        {{-- Tabel --}}
        <table
            border="1"
            style="
                width:100%;
                border-collapse:collapse;
                font-size:13px;
                min-width:950px;
            "
        >

            <thead>

                <tr style="background:#f2f2f2;">

                    <th style="
                        padding:10px;
                        text-align:center;
                        width:60px;
                    ">
                        No
                    </th>

                    <th style="
                        padding:10px;
                        text-align:center;
                    ">
                        No DPA
                    </th>

                    <th style="
                        padding:10px;
                        text-align:center;
                    ">
                        Nama Kegiatan
                    </th>

                    <th style="
                        padding:10px;
                        text-align:center;
                    ">
                        Kegiatan / Sub Kegiatan
                    </th>

                    <th style="
                        padding:10px;
                        text-align:center;
                        width:280px;
                    ">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($kegiatans as $k)

                    <tr>

                        {{-- Nomor --}}
                        <td style="
                            padding:8px;
                            text-align:center;
                        ">
                            {{ $loop->iteration }}
                        </td>


                        {{-- No DPA --}}
                        <td style="
                            padding:8px;
                            vertical-align:top;
                        ">

                            {{ $k->nomor_tanggal_dpa ?? '-' }}

                        </td>


                        {{-- Nama Kegiatan --}}
                        <td style="
                            padding:8px;
                            vertical-align:top;
                        ">

                            {{ $k->program_kegiatan ?? '-' }}

                        </td>


                        {{-- Kegiatan / Sub Kegiatan --}}
                        <td style="
                            padding:8px;
                            vertical-align:top;
                        ">

                            <strong>
                                {{ $k->kegiatan ?? '-' }}
                            </strong>

                            <br>

                            <span style="color:#666;">
                                {{ $k->sub_kegiatan ?? '-' }}
                            </span>

                        </td>


                        {{-- Aksi --}}
                        <td style="
                            padding:8px;
                            text-align:center;
                            vertical-align:middle;
                            white-space:nowrap;
                        ">


                            {{-- EDIT --}}
                            <a
                                href="{{ route('kegiatan.edit', $k->id) }}"
                                style="
                                    background:#ffc107;
                                    color:#000;
                                    padding:8px 12px;
                                    text-decoration:none;
                                    border-radius:5px;
                                    display:inline-block;
                                    margin:2px;
                                    font-size:12px;
                                "
                            >
                                ✏ Edit 25 Poin
                            </a>


                            {{-- PRINT --}}
                            <a
                                href="{{ route('kegiatan.print', $k->id) }}"
                                target="_blank"
                                style="
                                    background:#dc3545;
                                    color:#fff;
                                    padding:8px 12px;
                                    text-decoration:none;
                                    border-radius:5px;
                                    display:inline-block;
                                    margin:2px;
                                    font-size:12px;
                                "
                            >
                                🖨 Print
                            </a>


                            {{-- HAPUS --}}
                            <form
                                action="{{ route('kegiatan.destroy', $k->id) }}"
                                method="POST"
                                style="
                                    display:inline-block;
                                    margin:2px;
                                "
                                onsubmit="return confirm('Yakin ingin menghapus data kegiatan ini?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    style="
                                        background:#6c757d;
                                        color:#fff;
                                        border:none;
                                        padding:8px 12px;
                                        border-radius:5px;
                                        cursor:pointer;
                                        font-size:12px;
                                    "
                                >
                                    🗑 Hapus
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            style="
                                padding:30px;
                                text-align:center;
                                color:#777;
                            "
                        >

                            <div style="font-size:35px; margin-bottom:10px;">
                                📂
                            </div>

                            Belum ada data kegiatan.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection