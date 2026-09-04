<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cetak Data Kontrak</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #000;
            background: #fff;
            margin: 0;
            padding: 20px;
        }

        .print-container {
            width: 100%;
            max-width: 900px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0 0 5px 0;
            font-size: 18px;
        }

        .header h3 {
            margin: 0;
            font-size: 15px;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 12px;
        }

        .garis {
            border-top: 2px solid #000;
            margin: 12px 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            border: 1px solid #000;
            padding: 7px;
            vertical-align: top;
        }

        .data-table .no {
            width: 35px;
            text-align: center;
            font-weight: bold;
        }

        .data-table .label {
            width: 250px;
            font-weight: bold;
        }

        .data-table .value {
            width: auto;
        }

        .termin-table {
            margin-top: 10px;
        }

        .termin-table th,
        .termin-table td {
            border: 1px solid #000;
            padding: 7px;
            text-align: center;
        }

        .termin-table th {
            font-weight: bold;
        }

        .text-left {
            text-align: left !important;
        }

        .signature {
            margin-top: 60px;
            width: 100%;
        }

        .signature-box {
            width: 300px;
            margin-left: auto;
            text-align: center;
        }

        .signature-space {
            height: 80px;
        }

        .btn-print {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            background: #198754;
            color: white;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-back {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 18px;
            border: 1px solid #198754;
            border-radius: 6px;
            background: white;
            color: #198754;
            cursor: pointer;
            font-size: 13px;
        }

        @media print {

            body {
                padding: 0;
            }

            .btn-print,
            .btn-back {
                display: none;
            }

            .print-container {
                max-width: 100%;
            }

            @page {
                size: A4;
                margin: 15mm;
            }

        }

    </style>

</head>

<body>


<button
    class="btn-back"
    onclick="history.back()"
>
    ← Kembali
</button>


<button
    class="btn-print"
    onclick="window.print()"
>
    🖨 Cetak
</button>


<div class="print-container">


    <!-- HEADER -->

    <div class="header">

        <h2>
            DINAS PERUMAHAN DAN KAWASAN PERMUKIMAN
        </h2>

        <h3>
            KABUPATEN MUSI BANYUASIN
        </h3>

        <p>
            DATA KONTRAK / KEGIATAN
        </p>

        <div class="garis"></div>

    </div>


    <!-- 25 POIN -->

    <table class="data-table">

        <!-- 1 -->

        <tr>

            <td class="no">1</td>

            <td class="label">
                No DPA SKPD & Tgl DPA
            </td>

            <td class="value">
                {{ $kegiatan->nomor_tanggal_dpa ?? '-' }}
            </td>

        </tr>


        <!-- 2 -->

        <tr>

            <td class="no">2</td>

            <td class="label">
                Nama & Nomor Kegiatan
            </td>

            <td class="value">
                {{ $kegiatan->program_kegiatan ?? '-' }}
            </td>

        </tr>


        <!-- 3 -->

        <tr>

            <td class="no">3</td>

            <td class="label">
                Kegiatan / Sub Kegiatan
            </td>

            <td class="value">

                <strong>
                    {{ $kegiatan->kegiatan ?? '-' }}
                </strong>

                <br>

                {{ $kegiatan->sub_kegiatan ?? '-' }}

            </td>

        </tr>


        <!-- 4 -->

        <tr>

            <td class="no">4</td>

            <td class="label">
                Kode Belanja
            </td>

            <td class="value">
                {{ $kegiatan->kode_belanja ?? '-' }}
            </td>

        </tr>


        <!-- 5 -->

        <tr>

            <td class="no">5</td>

            <td class="label">
                Pagu Anggaran
            </td>

            <td class="value">

                Rp
                {{ number_format(
                    $kegiatan->pagu_anggaran ?? 0,
                    0,
                    ',',
                    '.'
                ) }}

            </td>

        </tr>


        <!-- 6 -->

        <tr>

            <td class="no">6</td>

            <td class="label">
                Nomor & Tgl SPK / Kontrak
            </td>

            <td class="value">
                {{ $kegiatan->nomor_tanggal_kontrak ?? '-' }}
            </td>

        </tr>


        <!-- 7 -->

        <tr>

            <td class="no">7</td>

            <td class="label">
                Nomor & Tgl Kontrak Addendum
            </td>

            <td class="value">
                {{ $kegiatan->nomor_tanggal_addendum ?? '-' }}
            </td>

        </tr>


        <!-- 8 -->

        <tr>

            <td class="no">8</td>

            <td class="label">
                Nama Kontraktor / Perusahaan
            </td>

            <td class="value">
                {{ $kegiatan->nama_direktur_perusahaan ?? '-' }}
            </td>

        </tr>


        <!-- 9 -->

        <tr>

            <td class="no">9</td>

            <td class="label">
                Alamat Kontraktor
            </td>

            <td class="value">
                {{ $kegiatan->nama_alamat_penyedia ?? '-' }}
            </td>

        </tr>


        <!-- 10 -->

        <tr>

            <td class="no">10</td>

            <td class="label">
                NPWP
            </td>

            <td class="value">
                {{ $kegiatan->npwp_penyedia ?? '-' }}
            </td>

        </tr>


        <!-- 11 -->

        <tr>

            <td class="no">11</td>

            <td class="label">
                Nomor Rekening / Bank
            </td>

            <td class="value">
                {{ $kegiatan->nomor_rekening_bank ?? '-' }}
            </td>

        </tr>


        <!-- 12 -->

        <tr>

            <td class="no">12</td>

            <td class="label">
                Nilai SPK / Kontrak
            </td>

            <td class="value">

                Rp
                {{ number_format(
                    $kegiatan->nilai_kontrak_awal ?? 0,
                    0,
                    ',',
                    '.'
                ) }}

            </td>

        </tr>


        <!-- 13 -->

        <tr>

            <td class="no">13</td>

            <td class="label">
                Uraian dan Volume Pekerjaan
            </td>

            <td class="value">
                {{ $kegiatan->kegiatan ?? '-' }}
            </td>

        </tr>


        <!-- 14 -->

        <tr>

            <td class="no">14</td>

            <td class="label">
                Tata Cara & Syarat Pembayaran
            </td>

            <td class="value">

                Pembayaran dilakukan berdasarkan
                progres pekerjaan dan hasil pemeriksaan.

                <table class="termin-table">

                    <thead>

                        <tr>

                            <th>
                                Termin
                            </th>

                            <th>
                                Ya/Tidak
                            </th>

                            <th>
                                Nilai (Rp)
                            </th>

                            <th>
                                Fisik (%)
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            <td>
                                Uang Muka
                            </td>

                            <td>
                                {{ $kegiatan->umk_status ?? '-' }}
                            </td>

                            <td>
                                {{ number_format(
                                    $kegiatan->umk_nilai ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </td>

                            <td>
                                {{ $kegiatan->umk_fisik ?? 0 }}
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Termin I
                            </td>

                            <td>
                                {{ $kegiatan->t1_status ?? '-' }}
                            </td>

                            <td>
                                {{ number_format(
                                    $kegiatan->termin1 ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </td>

                            <td>
                                {{ $kegiatan->fisik1 ?? 0 }}
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Termin II
                            </td>

                            <td>
                                {{ $kegiatan->t2_status ?? '-' }}
                            </td>

                            <td>
                                {{ number_format(
                                    $kegiatan->termin2 ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}
                            </td>

                            <td>
                                {{ $kegiatan->fisik2 ?? 0 }}
                            </td>

                        </tr>


                        <tr>

                            <td>
                                <strong>JUMLAH</strong>
                            </td>

                            <td>
                                -
                            </td>

                            <td>
                                <strong>
                                    {{ number_format(
                                        $kegiatan->total_pembayaran ?? 0,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                </strong>
                            </td>

                            <td>
                                -
                            </td>

                        </tr>

                    </tbody>

                </table>

            </td>

        </tr>


        <!-- 15 -->

        <tr>

            <td class="no">15</td>

            <td class="label">
                Nilai SPM yang Diminta
            </td>

            <td class="value">

                Rp
                {{ number_format(
                    $kegiatan->nilai_spm ?? 0,
                    0,
                    ',',
                    '.'
                ) }}

            </td>

        </tr>


        <!-- 15b -->

        <tr>

            <td class="no">
                15b
            </td>

            <td class="label">
                Terbilang
            </td>

            <td class="value">
                {{ $kegiatan->terbilang_spm ?? '-' }}
            </td>

        </tr>


        <!-- 16 -->

        <tr>

            <td class="no">16</td>

            <td class="label">
                Untuk Permintaan Pembayaran
            </td>

            <td class="value">
                {{ $kegiatan->kegiatan ?? '-' }}
            </td>

        </tr>


        <!-- 17 -->

        <tr>

            <td class="no">17</td>

            <td class="label">
                Jangka Waktu Pelaksanaan
            </td>

            <td class="value">

                {{ $kegiatan->jangka_waktu ?? '-' }}

                @if($kegiatan->jangka_waktu_hari)

                    ({{ $kegiatan->jangka_waktu_hari }} hari)

                @endif

            </td>

        </tr>


        <!-- 18 -->

        <tr>

            <td class="no">18</td>

            <td class="label">
                Jangka Waktu Pelaksanaan Addendum
            </td>

            <td class="value">
                {{ $kegiatan->jangka_waktu_addendum ?? '-' }}
            </td>

        </tr>


        <!-- 19 -->

        <tr>

            <td class="no">19</td>

            <td class="label">
                Tanggal Mulai Kerja
            </td>

            <td class="value">

                @if($kegiatan->tanggal_mulai_kerja)

                    {{ \Carbon\Carbon::parse(
                        $kegiatan->tanggal_mulai_kerja
                    )->format('d-m-Y') }}

                @else

                    -

                @endif

            </td>

        </tr>


        <!-- 20 -->

        <tr>

            <td class="no">20</td>

            <td class="label">
                Tanggal Penyelesaian Pekerjaan
            </td>

            <td class="value">

                @if($kegiatan->tanggal_selesai_kerja)

                    {{ \Carbon\Carbon::parse(
                        $kegiatan->tanggal_selesai_kerja
                    )->format('d-m-Y') }}

                @else

                    -

                @endif

            </td>

        </tr>


        <!-- 21 -->

        <tr>

            <td class="no">21</td>

            <td class="label">
                Tgl Penyelesaian Addendum
            </td>

            <td class="value">

                @if($kegiatan->tanggal_selesai_addendum)

                    {{ \Carbon\Carbon::parse(
                        $kegiatan->tanggal_selesai_addendum
                    )->format('d-m-Y') }}

                @else

                    -

                @endif

            </td>

        </tr>


        <!-- 22 -->

        <tr>

            <td class="no">22</td>

            <td class="label">
                Jangka Waktu Pemeliharaan
            </td>

            <td class="value">
                {{ $kegiatan->jaminan_pemeliharaan ?? '-' }}
            </td>

        </tr>


        <!-- 23 -->

        <tr>

            <td class="no">23</td>

            <td class="label">
                Ketentuan Sanksi
            </td>

            <td class="value">
                {{ $kegiatan->sanksi_denda_telat ?? '-' }}
            </td>

        </tr>


        <!-- 24 -->

        <tr>

            <td class="no">24</td>

            <td class="label">
                Kode RUP / SIRUP
            </td>

            <td class="value">
                {{ $kegiatan->kode_rup ?? '-' }}
            </td>

        </tr>


        <!-- 25 -->

        <tr>

            <td class="no">25</td>

            <td class="label">
                TKDN
            </td>

            <td class="value">
                {{ $kegiatan->tkdn ?? '-' }}%
            </td>

        </tr>

    </table>


    <!-- TANDA TANGAN -->

    <div class="signature">

        <div class="signature-box">

            <p>
                Sekayu, __________________ 2026
            </p>

            <p>
                Mengetahui,
            </p>

            <div class="signature-space"></div>

            <strong>
                ______________________________
            </strong>

            <br>

            <span>
                Pejabat yang Berwenang
            </span>

        </div>

    </div>

</div>


<script>

    // Membuka dialog print otomatis setelah halaman selesai dimuat
    window.addEventListener('load', function () {

        setTimeout(function () {
            window.print();
        }, 500);

    });

</script>

</body>

</html>