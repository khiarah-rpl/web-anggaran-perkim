<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Kegiatan</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; font-size: 13px; display: block; margin-bottom: 5px; }
        textarea { width: 100%; padding: 8px; box-sizing: border-box; font-family: sans-serif; }
        table, th, td { border: 1px solid #ccc; border-collapse: collapse; }
        th, td { padding: 8px; text-align: center; }
        .section-header { font-weight: bold; color: green; margin-top: 25px; margin-bottom: 10px; border-bottom: 2px solid green; }
    </style>
</head>
<body>
    <h2>Tambah Data: Resume Kontrak/SPK</h2>

    <form action="{{ route('kegiatan.store') }}" method="POST">
        @csrf
        
        <div class="form-group"><label>1. No DPA SKPD & Tgl DPA</label><textarea name="nomor_tanggal_dpa" rows="2"></textarea></div>
        <div class="form-group"><label>2. Nama & Nomor Kegiatan</label><textarea name="program_kegiatan" rows="2"></textarea></div>
        <div class="form-group"><label>3. Kegiatan/Sub Kegiatan</label><textarea name="sub_kegiatan" rows="2"></textarea></div>
        <div class="form-group"><label>4. Kode Belanja</label><textarea name="kode_belanja" rows="2"></textarea></div>
        <div class="form-group"><label>5. Pagu Anggaran</label><textarea name="pagu_anggaran" rows="2"></textarea></div>
        <div class="form-group"><label>6. Nomor & Tgl SPK/Kontrak</label><textarea name="nomor_tanggal_kontrak" rows="2"></textarea></div>
        <div class="form-group"><label>7. Nomor & Tgl Kontrak Addendum</label><textarea name="nomor_tanggal_addendum" rows="2"></textarea></div>
        <div class="form-group"><label>8. Nama Kontraktor / Perusahaan</label><textarea name="nama_direktur_perusahaan" rows="2"></textarea></div>
        <div class="form-group"><label>9. Alamat Kontraktor</label><textarea name="nama_alamat_penyedia" rows="3"></textarea></div>
        <div class="form-group"><label>10. NPWP</label><textarea name="npwp_penyedia" rows="2"></textarea></div>
        <div class="form-group"><label>11. Nomor Rekening / Bank</label><textarea name="nomor_rekening_bank" rows="2"></textarea></div>
        <div class="form-group"><label>12. Nilai SPK / Kontrak</label><textarea name="nilai_kontrak_awal" rows="2"></textarea></div>
        <div class="form-group"><label>13. Uraian dan Volume Pekerjaan</label><textarea name="kegiatan" rows="4"></textarea></div>
        
        <div class="form-group">
            <label>14. Tata Cara & Syarat Pembayaran</label>
            <table style="width: 100%;">
                <thead><tr style="background-color: #f2f2f2;"><th>Termin</th><th>Ya/Tidak</th><th>Nilai (Rp)</th><th>Fisik (%)</th></tr></thead>
                <tbody>
                    <tr><td>Uang Muka</td><td><textarea name="umk_status" rows="1" style="border:none;"></textarea></td><td><textarea name="umk_nilai" rows="1" style="border:none;"></textarea></td><td><textarea name="umk_fisik" rows="1" style="border:none;"></textarea></td></tr>
                    <tr><td>Termin I</td><td><textarea name="t1_status" rows="1" style="border:none;"></textarea></td><td><textarea name="termin1" rows="1" style="border:none;"></textarea></td><td><textarea name="fisik1" rows="1" style="border:none;"></textarea></td></tr>
                    <tr><td>Termin II</td><td><textarea name="t2_status" rows="1" style="border:none;"></textarea></td><td><textarea name="termin2" rows="1" style="border:none;"></textarea></td><td><textarea name="fisik2" rows="1" style="border:none;"></textarea></td></tr>
                    <tr><td><strong>JUMLAH</strong></td><td></td><td><textarea name="total_pembayaran" rows="1" style="border:none; font-weight:bold;"></textarea></td><td></td></tr>
                </tbody>
            </table>
        </div>

        <div class="form-group"><label>15. Nilai SPM yang diminta</label><textarea name="nilai_spm" rows="2"></textarea></div>
        <div class="form-group"><label>15b. Terbilang</label><textarea name="terbilang_spm" rows="2"></textarea></div>
        <div class="form-group"><label>16. Untuk Permintaan Pembayaran</label><textarea name="jangka_waktu" rows="2"></textarea></div>
        <div class="form-group"><label>17. Jangka Waktu Pelaksanaan</label><textarea name="jangka_waktu_hari" rows="2"></textarea></div>
        <div class="form-group"><label>18. Jangka Waktu Pelaksanaan Addendum</label><textarea name="jangka_waktu_addendum" rows="2"></textarea></div>
        <div class="form-group"><label>19. Tanggal Mulai Kerja</label><textarea name="tanggal_mulai_kerja" rows="2"></textarea></div>
        <div class="form-group"><label>20. Tanggal Penyelesaian Pekerjaan</label><textarea name="tanggal_selesai_kerja" rows="2"></textarea></div>
        <div class="form-group"><label>21. Tgl Penyelesaian Addendum</label><textarea name="tanggal_selesai_addendum" rows="2"></textarea></div>
        <div class="form-group"><label>22. Jangka Waktu Pemeliharaan</label><textarea name="jaminan_pemeliharaan" rows="2"></textarea></div>
        <div class="form-group"><label>23. Ketentuan Sanksi</label><textarea name="sanksi_denda_telat" rows="2"></textarea></div>
        <div class="form-group"><label>24. Kode RUP / SIRUP</label><textarea name="kode_rup" rows="2"></textarea></div>
        <div class="form-group"><label>25. TKDN</label><textarea name="tkdn" rows="2"></textarea></div>

        <button type="submit" style="padding: 10px 20px; cursor: pointer;">Simpan Data</button>
        <a href="{{ route('kegiatan.index') }}">Batal</a>
    </form>
</body>
</html>