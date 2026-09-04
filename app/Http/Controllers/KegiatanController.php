<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KegiatanController extends Controller
{
    /**
     * Menampilkan semua data kegiatan
     */
    public function index()
    {
        $kegiatans = Kegiatan::orderByDesc('id')->get();

        return view('kegiatan.index', compact('kegiatans'));
    }

    /**
     * Cetak semua data kegiatan
     */
    public function cetakSemua()
    {
        $kegiatans = Kegiatan::orderByDesc('id')->get();

        foreach ($kegiatans as $item) {
            $item->pagu_anggaran = (float) ($item->pagu_anggaran ?? 0);
            $item->nilai_kontrak_awal = (float) ($item->nilai_kontrak_awal ?? 0);
            $item->umk_nilai = (float) ($item->umk_nilai ?? 0);
            $item->umk_fisik = (float) ($item->umk_fisik ?? 0);
            $item->termin1 = (float) ($item->termin1 ?? 0);
            $item->fisik1 = (float) ($item->fisik1 ?? 0);
            $item->termin2 = (float) ($item->termin2 ?? 0);
            $item->fisik2 = (float) ($item->fisik2 ?? 0);
            $item->total_pembayaran = (float) ($item->total_pembayaran ?? 0);
            $item->nilai_spm = (float) ($item->nilai_spm ?? 0);
        }

        return view('kegiatan.cetak-semua', compact('kegiatans'));
    }

    /**
     * Form tambah kegiatan
     */
    public function create()
    {
        return view('kegiatan.tambah');
    }

    /**
     * Mengubah tanggal Indonesia menjadi format MySQL
     *
     * Contoh:
     * 01 Juli 2026      -> 2026-07-01
     * 27 November 2026  -> 2026-11-27
     */
    private function formatTanggal(?string $tanggal): ?string
    {
        if (empty($tanggal)) {
            return null;
        }

        $tanggal = trim($tanggal);

        // Jika sudah format YYYY-MM-DD
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
            try {
                return Carbon::createFromFormat('Y-m-d', $tanggal)->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        // Konversi nama bulan Indonesia ke bahasa Inggris
        $bulan = [
            'januari'   => 'January',
            'februari'  => 'February',
            'maret'     => 'March',
            'april'     => 'April',
            'mei'       => 'May',
            'juni'      => 'June',
            'juli'      => 'July',
            'agustus'   => 'August',
            'september' => 'September',
            'oktober'   => 'October',
            'november'  => 'November',
            'desember'  => 'December',
        ];

        $tanggalLower = strtolower($tanggal);

        foreach ($bulan as $indo => $english) {
            $tanggalLower = str_replace($indo, $english, $tanggalLower);
        }

        try {
            return Carbon::parse($tanggalLower)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Membersihkan angka sebelum disimpan
     *
     * Contoh:
     * 500.000.000     -> 500000000
     * Rp 500.000.000  -> 500000000
     * 40%             -> 40
     */
    private function formatAngka(mixed $nilai): ?string
    {
        if ($nilai === null || $nilai === '') {
            return null;
        }

        $nilai = trim((string) $nilai);

        $nilai = str_replace(
            ['Rp', 'rp', 'RP', '%', ' '],
            '',
            $nilai
        );

        // Hapus titik pemisah ribuan
        $nilai = str_replace('.', '', $nilai);

        // Koma menjadi desimal
        $nilai = str_replace(',', '.', $nilai);

        return is_numeric($nilai) ? $nilai : null;
    }

    /**
     * Membersihkan data sebelum disimpan atau di-update
     */
    private function prepareData(array $data): array
    {
        /*
        |--------------------------------------------------------------------------
        | FORMAT TANGGAL
        |--------------------------------------------------------------------------
        */

        $kolomTanggal = [
            'tanggal_mulai_kerja',
            'tanggal_selesai_kerja',
            'tanggal_selesai_addendum',
        ];

        foreach ($kolomTanggal as $kolom) {
            if (array_key_exists($kolom, $data)) {
                $data[$kolom] = $this->formatTanggal($data[$kolom]);
            }
        }


        $kolomAngka = [
            'pagu_anggaran',
            'nilai_kontrak_awal',
            'umk_nilai',
            'umk_fisik',
            'termin1',
            'fisik1',
            'termin2',
            'fisik2',
            'total_pembayaran',
            'nilai_spm',
        ];

        foreach ($kolomAngka as $kolom) {
            if (array_key_exists($kolom, $data)) {
                $data[$kolom] = $this->formatAngka($data[$kolom]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | FORMAT TKDN
        |--------------------------------------------------------------------------
        */

        if (array_key_exists('tkdn', $data)) {
            $data['tkdn'] = str_replace('%', '', (string) $data['tkdn']);
            $data['tkdn'] = trim($data['tkdn']);
        }

        /*
        |--------------------------------------------------------------------------
        | UBAH "-" MENJADI NULL
        |--------------------------------------------------------------------------
        */

        foreach ($data as $key => $value) {
            if (is_string($value) && trim($value) === '-') {
                $data[$key] = null;
            }
        }

        return $data;
    }

    /**
     * Menyimpan data kegiatan baru
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data = $this->prepareData($data);

        Kegiatan::create($data);

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Data kegiatan berhasil ditambahkan!');
    }


    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.edit', [
            'data' => $kegiatan
        ]);
    }

    
    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $data = $request->all();

        $data = $this->prepareData($data);

        $kegiatan->update($data);

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Data kegiatan berhasil diperbarui!');
    }

   
    public function print(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view('kegiatan.print', compact('kegiatan'));
    }

    
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->delete();

        return redirect()
            ->route('kegiatan.index')
            ->with('success', 'Data kegiatan berhasil dihapus!');
    }
}