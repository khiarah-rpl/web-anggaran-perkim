<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan; // Ubah dari Kontrak ke Kegiatan

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Kegiatan::query(); // Ubah dari Kontrak ke Kegiatan

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                // Pastikan kolom-kolom ini ada di tabel kegiatans Anda
                $q->where('kegiatan', 'like', '%' . $search . '%')
                  ->orWhere('nomor_tanggal_dpa', 'like', '%' . $search . '%') // Sesuaikan dengan nama kolom Anda
                  ->orWhere('nama_alamat_penyedia', 'like', '%' . $search . '%');
            });
        }

        $allData = $query->latest()->paginate(10);

        // Ringkasan data untuk card atas dashboard
        $totalKontrak = Kegiatan::count();
        $totalKegiatan = Kegiatan::count();
        $totalSpm = Kegiatan::whereNotNull('nilai_spm')->count(); // Sesuaikan kolomnya
        
        // Menghitung total pencairan dari kolom nilai_spm
        $totalPembayaran = Kegiatan::sum('nilai_spm'); 

        // Menghitung dana pagu awal kontrak
        $nilaiKontrak = Kegiatan::sum('nilai_kontrak_awal'); 

        return view('dashboard', compact(
            'allData', 
            'totalKontrak', 
            'totalKegiatan', 
            'totalSpm', 
            'totalPembayaran', 
            'nilaiKontrak'
        ));
    }

    public function kontrakPage()
    {
        $allData = Kegiatan::latest()->get();
        return view('laporan-kontrak', compact('allData'));
    }

    public function spmPage()
    {
        $allData = Kegiatan::latest()->get();
        return view('laporan-spm', compact('allData'));
    }

    public function pembayaranPage()
    {
        $allData = Kegiatan::latest()->get();
        return view('pembayaran', compact('allData'));
    }

    public function dokumenPage()
    {
        $totalKontrak = Kegiatan::count();
        $totalSpm = Kegiatan::whereNotNull('nilai_spm')->count();
        return view('dokumen', compact('totalKontrak', 'totalSpm'));
    }

    public function kalenderPage()
    {
        $allData = Kegiatan::whereNotNull('tanggal_mulai_kerja')->orWhereNotNull('created_at')->latest()->get();
        return view('kalender', compact('allData'));
    }
}