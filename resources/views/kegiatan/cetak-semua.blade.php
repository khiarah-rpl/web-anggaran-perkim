<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Times New Roman', serif; font-size: 11px; margin: 20px; }
        .header { border-bottom: 3px solid #000; padding-bottom: 5px; margin-bottom: 10px; display: flex; align-items: center; }
        .logo { width: 70px; margin-right: 20px; }
        .title { text-align: center; font-weight: bold; font-size: 14px; width: 100%; }
        .resume-title { text-align: center; font-weight: bold; text-decoration: underline; margin: 15px 0; }
        .main-table { width: 100%; border-collapse: collapse; }
        .main-table td { padding: 3px; vertical-align: top; }
        .payment-table { border: 1px solid #000; width: 100%; margin-top: 5px; border-collapse: collapse; }
        .payment-table th, .payment-table td { border: 1px solid #000; padding: 4px; text-align: center; }
        
        /* Tambahkan ini agar tiap data pindah ke halaman baru saat dicetak */
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body onload="window.print()">

@foreach($kegiatans as $data)
    <div class="page-break">
        <div class="header">
            <img src="{{ asset('img/logo-muba.jpg') }}" class="logo">
            <div class="title">
                PEMERINTAH KABUPATEN MUSI BANYUASIN<br>
                DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN<br>
                <span style="font-size: 9px; font-weight: normal;">Jalan Bupati Oesman Bakar No. 584 B Kelurahan Kayuara Kecamatan Sekayu</span>
            </div>
        </div>

        <div class="resume-title">RESUME (RINGKASAN) KONTRAK/SPK</div>

        <table class="main-table">
            <tr><td style="width: 35%;">1. No DPA SKPD & Tgl DPA</td><td>: {{ $data->nomor_tanggal_dpa }}</td></tr>
            <tr><td>2. Nama & Nomor Kegiatan</td><td>: {{ $data->program_kegiatan }}</td></tr>
            <tr><td>3. Kegiatan/Sub Kegiatan</td><td>: {{ $data->sub_kegiatan }}</td></tr>
            <tr><td>4. Kode Belanja yang Dibebani</td><td>: {{ $data->kode_belanja }}</td></tr>
            <tr><td>5. Pagu Anggaran</td><td>: {{ number_format($data->pagu_anggaran, 0, ',', '.') }}</td></tr>
            <tr><td>6. Nomor dan tanggal SPK/Kontrak</td><td>: {{ $data->nomor_tanggal_kontrak }}</td></tr>
            <tr><td>7. Nomor dan tanggal Kontrak Addendum</td><td>: {{ $data->nomor_tanggal_addendum }}</td></tr>
            <tr><td>8. Nama Kontraktor / Perusahaan</td><td>: {{ $data->nama_direktur_perusahaan }}</td></tr>
            <tr><td>9. Alamat Kontraktor</td><td>: {{ $data->nama_alamat_penyedia }}</td></tr>
            <tr><td>10. NPWP</td><td>: {{ $data->npwp_penyedia }}</td></tr>
            <tr><td>11. Nomor Rekening / Bank</td><td>: {{ $data->nomor_rekening_bank }}</td></tr>
            <tr><td>12. Nilai SPK / Kontrak</td><td>: {{ number_format($data->nilai_kontrak_awal, 0, ',', '.') }}</td></tr>
            <tr><td>13. Uraian dan Volume Pekerjaan</td><td>: {{ $data->kegiatan }}</td></tr>
            <tr><td>14. Tata Cara & Syarat Pembayaran</td><td>: 
                <table class="payment-table">
                    <tr><th>Termin</th><th>Ya/Tidak</th><th>Nilai (Rp)</th><th>Fisik (%)</th></tr>
                    <tr><td>Uang Muka</td><td>{{ $data->umk_status }}</td><td>{{ number_format($data->umk_nilai, 0, ',', '.') }}</td><td>{{ $data->umk_fisik }}</td></tr>
                    <tr><td>Termin I</td><td>{{ $data->t1_status }}</td><td>{{ number_format($data->termin1, 0, ',', '.') }}</td><td>{{ $data->fisik1 }}</td></tr>
                    <tr><td>Termin II</td><td>{{ $data->t2_status }}</td><td>{{ number_format($data->termin2, 0, ',', '.') }}</td><td>{{ $data->fisik2 }}</td></tr>
                    <tr><td><strong>JUMLAH</strong></td><td></td><td><strong>{{ number_format($data->total_pembayaran, 0, ',', '.') }}</strong></td><td></td></tr>
                </table>
            </td></tr>
            <tr><td>15. Nilai SPM yang diminta</td><td>: {{ number_format($data->nilai_spm, 0, ',', '.') }}</td></tr>
            <tr><td>15b. Terbilang</td><td>: {{ $data->terbilang_spm }}</td></tr>
            <tr><td>16. Untuk Permintaan Pembayaran</td><td>: {{ $data->jangka_waktu }}</td></tr>
            <tr><td>17. Jangka Waktu Pelaksanaan</td><td>: {{ $data->jangka_waktu_hari }}</td></tr>
            <tr><td>18. Jangka Waktu Pelaksanaan Addendum</td><td>: {{ $data->jangka_waktu_addendum }}</td></tr>
            <tr><td>19. Tanggal Mulai Kerja</td><td>: {{ $data->tanggal_mulai_kerja }}</td></tr>
            <tr><td>20. Tanggal Penyelesaian Pekerjaan</td><td>: {{ $data->tanggal_selesai_kerja }}</td></tr>
            <tr><td>21. Tgl Penyelesaian Addendum</td><td>: {{ $data->tanggal_selesai_addendum }}</td></tr>
            <tr><td>22. Jangka Waktu Pemeliharaan</td><td>: {{ $data->jaminan_pemeliharaan }}</td></tr>
            <tr><td>23. Ketentuan Sanksi</td><td>: {{ $data->sanksi_denda_telat }}</td></tr>
            <tr><td>24. Kode RUP / SIRUP</td><td>: {{ $data->kode_rup }}</td></tr>
            <tr><td>25. TKDN</td><td>: {{ $data->tkdn }} %</td></tr>
        </table>
            
        <div style="margin-top: 20px; width: 100%;">
            <div style="float: right; width: 300px; text-align: center;">
                Sekayu, 2026 <br>
                PEJABAT PEMBUAT KOMITMEN <br>
                DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN <br>
                KABUPATEN MUSI BANYUASIN T.A 2025 <br><br><br><br><br>
                ( ........................................... )
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
@endforeach

</body>
</html>