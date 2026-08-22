<!DOCTYPE html>
<html>
<head>
    <title>Edit Resume Kontrak Lengkap</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; font-size: 13px; display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        table, th, td { border: 1px solid #ccc; border-collapse: collapse; }
        th, td { padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2>Edit Data: Resume Kontrak/SPK</h2>

    <form action="{{ route('kegiatan.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group"><label>1. No DPA SKPD & Tgl DPA</label><input type="text" name="nomor_tanggal_dpa" value="{{ $data->nomor_tanggal_dpa }}"></div>
        <div class="form-group"><label>2. Nama & Nomor Kegiatan</label><input type="text" name="program_kegiatan" value="{{ $data->program_kegiatan }}"></div>
        <div class="form-group"><label>3. Kegiatan/Sub Kegiatan</label><input type="text" name="sub_kegiatan" value="{{ $data->sub_kegiatan }}"></div>
        <div class="form-group"><label>4. Kode Belanja yang Dibebani</label><input type="text" name="kode_belanja" value="{{ $data->kode_belanja }}"></div>
        <div class="form-group"><label>5. Pagu Anggaran</label><input type="text" name="pagu_anggaran" value="{{ $data->pagu_anggaran }}"></div>
        <div class="form-group"><label>6. Nomor dan tanggal SPK/Kontrak</label><input type="text" name="nomor_tanggal_kontrak" value="{{ $data->nomor_tanggal_kontrak }}"></div>
        <div class="form-group"><label>7. Nomor dan tanggal Kontrak Addendum</label><input type="text" name="nomor_tanggal_addendum" value="{{ $data->nomor_tanggal_addendum }}"></div>
        <div class="form-group"><label>8. Nama Kontraktor / Perusahaan</label><input type="text" name="nama_direktur_perusahaan" value="{{ $data->nama_direktur_perusahaan }}"></div>
        <div class="form-group"><label>9. Alamat Kontraktor</label><input type="text" name="nama_alamat_penyedia" value="{{ $data->nama_alamat_penyedia }}"></div>
        <div class="form-group"><label>10. NPWP</label><input type="text" name="npwp_penyedia" value="{{ $data->npwp_penyedia }}"></div>
        <div class="form-group"><label>11. Nomor Rekening / Bank</label><input type="text" name="nomor_rekening_bank" value="{{ $data->nomor_rekening_bank }}"></div>
        <div class="form-group"><label>12. Nilai SPK / Kontrak</label><input type="text" name="nilai_kontrak_awal" value="{{ $data->nilai_kontrak_awal }}"></div>
        <div class="form-group"><label>13. Uraian dan Volume Pekerjaan</label><input type="text" name="kegiatan" value="{{ $data->kegiatan }}"></div>
        
        <div class="form-group">
            <label>14. Tata Cara & Syarat Pembayaran</label>
            <table style="width: 100%;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th>Termin</th><th>Ya/Tidak</th><th>Nilai (Rp)</th><th>Fisik (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Uang Muka</td>
                        <td><input type="text" name="umk_status" value="{{ $data->umk_status }}" style="border:none;"></td>
                        <td><input type="text" name="umk_nilai" value="{{ $data->umk_nilai }}" style="border:none;"></td>
                        <td><input type="text" name="umk_fisik" value="{{ $data->umk_fisik }}" style="border:none;"></td>
                    </tr>
                    <tr>
                        <td>Termin I</td>
                        <td><input type="text" name="t1_status" value="{{ $data->t1_status }}" style="border:none;"></td>
                        <td><input type="text" name="termin1" value="{{ $data->termin1 }}" style="border:none;"></td>
                        <td><input type="text" name="fisik1" value="{{ $data->fisik1 }}" style="border:none;"></td>
                    </tr>
                    <tr>
                        <td>Termin II</td>
                        <td><input type="text" name="t2_status" value="{{ $data->t2_status }}" style="border:none;"></td>
                        <td><input type="text" name="termin2" value="{{ $data->termin2 }}" style="border:none;"></td>
                        <td><input type="text" name="fisik2" value="{{ $data->fisik2 }}" style="border:none;"></td>
                    </tr>
                    <tr>
                        <td><strong>JUMLAH</strong></td>
                        <td></td>
                        <td><input type="text" name="total_pembayaran" value="{{ $data->total_pembayaran }}" style="border:none; font-weight:bold;"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group"><label>15. Nilai SPM yang diminta</label><input type="text" name="nilai_spm" value="{{ $data->nilai_spm }}"></div>
        <div class="form-group"><label>15b. Terbilang</label><input type="text" name="terbilang_spm" value="{{ $data->terbilang_spm }}"></div>
        <div class="form-group"><label>16. Untuk Permintaan Pembayaran</label><input type="text" name="jangka_waktu" value="{{ $data->jangka_waktu }}"></div>
        <div class="form-group"><label>17. Jangka Waktu Pelaksanaan</label><input type="text" name="jangka_waktu_hari" value="{{ $data->jangka_waktu_hari }}"></div>
        <div class="form-group"><label>18. Jangka Waktu Pelaksanaan Addendum</label><input type="text" name="jangka_waktu_addendum" value="{{ $data->jangka_waktu_addendum }}"></div>
        <div class="form-group"><label>19. Tanggal Mulai Kerja</label><input type="text" name="tanggal_mulai_kerja" value="{{ $data->tanggal_mulai_kerja }}"></div>
        <div class="form-group"><label>20. Tanggal Penyelesaian Pekerjaan</label><input type="text" name="tanggal_selesai_kerja" value="{{ $data->tanggal_selesai_kerja }}"></div>
        <div class="form-group"><label>21. Tgl Penyelesaian Addendum</label><input type="text" name="tanggal_selesai_addendum" value="{{ $data->tanggal_selesai_addendum }}"></div>
        <div class="form-group"><label>22. Jangka Waktu Pemeliharaan</label><input type="text" name="jaminan_pemeliharaan" value="{{ $data->jaminan_pemeliharaan }}"></div>
        <div class="form-group"><label>23. Ketentuan Sanksi</label><input type="text" name="sanksi_denda_telat" value="{{ $data->sanksi_denda_telat }}"></div>
        <div class="form-group"><label>24. Kode RUP / SIRUP</label><input type="text" name="kode_rup" value="{{ $data->kode_rup }}"></div>
        <div class="form-group"><label>25. TKDN</label><input type="text" name="tkdn" value="{{ $data->tkdn }}"></div>

        <button type="submit" style="margin-top: 20px; padding: 10px 20px; cursor: pointer;">Update Data</button>
        <a href="{{ route('kegiatan.index') }}">Batal</a>
    </form>
</body>
</html>