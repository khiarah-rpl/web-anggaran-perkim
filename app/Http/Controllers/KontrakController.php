<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;

class KontrakController extends Controller
{
    public function index()
    {
        $data = Kontrak::latest()->get();
        return view('kegiatan.index', compact('data'));
    }

    public function create()
    {
        return view('kegiatan.tambah');
    }

    public function store(Request $request)
    {
        Kontrak::create($request->all());
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $data = Kontrak::findOrFail($id);
        return view('kegiatan.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $data = Kontrak::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $data = Kontrak::findOrFail($id);
        $data->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Data berhasil dihapus.');
    }

    // Method Baru untuk Cetak Semua
    public function cetakSemua()
    {
        $allData = Kontrak::all();
        return view('kegiatan.cetak-semua', compact('allData'));
    }
}