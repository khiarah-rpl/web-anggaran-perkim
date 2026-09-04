<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * ============================================================
     * DASHBOARD UTAMA
     * ============================================================
     */
    public function index()
    {
        // Jumlah seluruh data kontrak
        $totalKontrak = Kegiatan::count();

        // Jumlah seluruh kegiatan
        $totalKegiatan = Kegiatan::count();

        // Total nilai kontrak
        $nilaiKontrak = Kegiatan::sum('nilai_kontrak_awal');

        // Total jumlah SPM
        $totalSpm = Kegiatan::where('nilai_spm', '>', 0)->count();

        // Total pembayaran
        $totalPembayaran = Kegiatan::sum('total_pembayaran');

        // Total pagu anggaran
        $totalPagu = Kegiatan::sum('pagu_anggaran');

        // Jumlah kontraktor unik
        $totalKontraktor = Kegiatan::whereNotNull('nama_direktur_perusahaan')
            ->where('nama_direktur_perusahaan', '!=', '')
            ->distinct()
            ->count('nama_direktur_perusahaan');

        // 5 data kegiatan terbaru
        $kegiatanTerbaru = Kegiatan::orderByDesc('id')
            ->limit(5)
            ->get();

        // Rekap berdasarkan program kegiatan
        $rekapProgram = Kegiatan::select(
                'program_kegiatan',
                DB::raw('COUNT(*) as jumlah'),
                DB::raw('COALESCE(SUM(nilai_kontrak_awal), 0) as total_kontrak'),
                DB::raw('COALESCE(SUM(nilai_spm), 0) as total_spm')
            )
            ->groupBy('program_kegiatan')
            ->orderByDesc('jumlah')
            ->get();

        return view('dashboard', compact(
            'totalKontrak',
            'totalKegiatan',
            'nilaiKontrak',
            'totalSpm',
            'totalPembayaran',
            'totalPagu',
            'totalKontraktor',
            'kegiatanTerbaru',
            'rekapProgram'
        ));
    }


    /**
     * ============================================================
     * HALAMAN SEMUA KEGIATAN
     * ============================================================
     */
    public function kegiatan()
    {
        $kegiatans = Kegiatan::orderByDesc('id')
            ->paginate(10);

        return view('kegiatan.index', compact('kegiatans'));
    }


    /**
     * ============================================================
     * HALAMAN KONTRAK
     * ============================================================
     */
    public function kontrakPage(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));

        $kegiatans = Kegiatan::query()
            ->when($keyword !== '', function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('nomor_tanggal_dpa', 'like', '%' . $keyword . '%')
                        ->orWhere('program_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('sub_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('kode_belanja', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_tanggal_kontrak', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_direktur_perusahaan', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_alamat_penyedia', 'like', '%' . $keyword . '%')
                        ->orWhere('kode_rup', 'like', '%' . $keyword . '%');

                });

            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('kegiatan.index', compact('kegiatans'));
    }


    /**
     * ============================================================
     * HALAMAN SPM
     * ============================================================
     *
     * Data akan muncul apabila:
     * - nilai_spm > 0
     * ATAU
     * - no_spm terisi
     *
     * Jadi data tetap muncul walaupun nomor SPM belum diisi.
     */
    public function spmPage(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));

        $kegiatans = Kegiatan::query()

            ->where(function ($query) {

                $query->where('nilai_spm', '>', 0)

                    ->orWhere(function ($q) {

                        $q->whereNotNull('no_spm')
                            ->where('no_spm', '!=', '');

                    });

            })

            ->when($keyword !== '', function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('no_spm', 'like', '%' . $keyword . '%')
                        ->orWhere('program_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('sub_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_direktur_perusahaan', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_alamat_penyedia', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_tanggal_kontrak', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_tanggal_dpa', 'like', '%' . $keyword . '%');

                });

            })

            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('spm.index', compact('kegiatans'));
    }


    /**
     * ============================================================
     * HALAMAN PEMBAYARAN
     * ============================================================
     */
    public function pembayaranPage(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));

        $kegiatans = Kegiatan::query()

            ->where(function ($query) {

                $query->where('total_pembayaran', '>', 0)

                    ->orWhere('nilai_spm', '>', 0);

            })

            ->when($keyword !== '', function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('no_spm', 'like', '%' . $keyword . '%')
                        ->orWhere('program_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('sub_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_direktur_perusahaan', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_alamat_penyedia', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_tanggal_kontrak', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_tanggal_dpa', 'like', '%' . $keyword . '%');

                });

            })

            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('pembayaran.index', compact('kegiatans'));
    }


    /**
     * ============================================================
     * HALAMAN KALENDER
     * ============================================================
     */
    public function kalenderPage()
    {
        $kegiatans = Kegiatan::orderBy('tanggal_mulai_kerja', 'asc')
            ->get();

        return view('kalender.index', compact('kegiatans'));
    }


    /**
     * ============================================================
     * PENCARIAN KEGIATAN
     * ============================================================
     */
    public function search(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));

        $kegiatans = Kegiatan::query()

            ->when($keyword !== '', function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('nomor_tanggal_dpa', 'like', '%' . $keyword . '%')
                        ->orWhere('program_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('sub_kegiatan', 'like', '%' . $keyword . '%')
                        ->orWhere('kode_belanja', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_tanggal_kontrak', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_tanggal_addendum', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_direktur_perusahaan', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_alamat_penyedia', 'like', '%' . $keyword . '%')
                        ->orWhere('npwp_penyedia', 'like', '%' . $keyword . '%')
                        ->orWhere('nomor_rekening_bank', 'like', '%' . $keyword . '%')
                        ->orWhere('no_spm', 'like', '%' . $keyword . '%')
                        ->orWhere('kode_rup', 'like', '%' . $keyword . '%');

                });

            })

            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('kegiatan.index', compact('kegiatans'));
    }


    /**
     * ============================================================
     * DETAIL KEGIATAN
     * ============================================================
     */
    public function show(int $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.show', compact('kegiatan'));
    }
}