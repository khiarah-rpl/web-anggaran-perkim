<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        // Mengambil semua data untuk ditampilkan di tabel
        $kegiatans = Kegiatan::all(); 
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function cetakSemua() 
{
    // Mengambil semua data
    $kegiatans = Kegiatan::all();

    // Memastikan data numerik diubah ke tipe float agar tidak error saat di-format di view
    foreach ($kegiatans as $item) {
        $item->pagu_anggaran = (float) $item->pagu_anggaran;
        $item->nilai_kontrak_awal = (float) $item->nilai_kontrak_awal;
        $item->umk_nilai = (float) $item->umk_nilai;
        $item->termin1 = (float) $item->termin1;
        $item->termin2 = (float) $item->termin2;
        $item->total_pembayaran = (float) $item->total_pembayaran;
        $item->nilai_spm = (float) $item->nilai_spm;
    }

    return view('kegiatan.cetak-semua', compact('kegiatans'));
}

    public function create()
    {
        return view('kegiatan.tambah');
    }

    public function store(Request $request)
    {
        Kegiatan::create($request->all());
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(string $id)
{
    // Mengambil data dari database
    $kegiatan = Kegiatan::findOrFail($id);
    
    // Kirim ke view dengan nama 'data' agar cocok dengan isi file edit.blade.php
    return view('kegiatan.edit', ['data' => $kegiatan]);
}

    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil dihapus!');
    }
}