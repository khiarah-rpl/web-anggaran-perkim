<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Resume Kontrak Lengkap</title>

    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background: #f5f7fa;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            font-size: 13px;
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-update {
            background: #0d5c34;
            color: white;
        }

        .btn-cancel {
            background: #6c757d;
            color: white;
            margin-left: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Edit Data: Resume Kontrak / SPK</h2>

    <form action="{{ route('kegiatan.update', $data->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>1. No DPA SKPD dan Tanggal DPA</label>

            <input
                type="text"
                name="no_dpa"
                value="{{ old('no_dpa', $data->no_dpa) }}"
            >

            <br><br>

            <input
                type="date"
                name="tgl_dpa"
                value="{{ old('tgl_dpa', $data->tgl_dpa) }}"
            >
        </div>

        <div class="form-group">
            <label>2. Nama dan Nomor Kegiatan</label>

            <textarea
                name="nama_kegiatan"
                rows="2"
            >{{ old('nama_kegiatan', $data->nama_kegiatan) }}</textarea>
        </div>

        <div class="form-group">
            <label>3. Kegiatan / Sub Kegiatan</label>

            <textarea
                name="sub_kegiatan"
                rows="2"
            >{{ old('sub_kegiatan', $data->sub_kegiatan) }}</textarea>
        </div>

        <div class="form-group">
            <label>4. Kode Belanja yang Dibebani</label>

            <input
                type="text"
                name="kode_belanja"
                value="{{ old('kode_belanja', $data->kode_belanja) }}"
            >
        </div>

        <div class="form-group">
            <label>5. Pagu Anggaran / Pagu Kegiatan</label>

            <input
                type="number"
                name="pagu_anggaran"
                value="{{ old('pagu_anggaran', $data->pagu_anggaran) }}"
            >
        </div>

        <div class="form-group">
            <label>6. Nomor dan Tanggal SPK / Kontrak</label>

            <input
                type="text"
                name="no_spk"
                value="{{ old('no_spk', $data->no_spk) }}"
            >

            <br><br>

            <input
                type="date"
                name="tgl_spk"
                value="{{ old('tgl_spk', $data->tgl_spk) }}"
            >
        </div>

        <div class="form-group">
            <label>7. Nomor dan Tanggal SPK / Kontrak Addendum</label>

            <input
                type="text"
                name="no_addendum"
                value="{{ old('no_addendum', $data->no_addendum) }}"
            >

            <br><br>

            <input
                type="date"
                name="tgl_addendum"
                value="{{ old('tgl_addendum', $data->tgl_addendum) }}"
            >
        </div>

        <div class="form-group">
            <label>8. Nama Kontraktor / Perusahaan</label>

            <input
                type="text"
                name="nama_kontraktor"
                value="{{ old('nama_kontraktor', $data->nama_kontraktor) }}"
            >
        </div>

        <div class="form-group">
            <label>9. Alamat Kontraktor</label>

            <textarea
                name="alamat_kontraktor"
                rows="2"
            >{{ old('alamat_kontraktor', $data->alamat_kontraktor) }}</textarea>
        </div>

        <div class="form-group">
            <label>10. NPWP</label>

            <input
                type="text"
                name="npwp"
                value="{{ old('npwp', $data->npwp) }}"
            >
        </div>

        <div class="form-group">
            <label>11. Nomor Rekening / Bank</label>

            <input
                type="text"
                name="no_rekening_bank"
                value="{{ old('no_rekening_bank', $data->no_rekening_bank) }}"
            >
        </div>

        <div class="form-group">
            <label>12. Nilai SPK / Kontrak</label>

            <input
                type="number"
                name="nilai_kontrak"
                value="{{ old('nilai_kontrak', $data->nilai_kontrak) }}"
                oninput="validasiSpm()"
            >
        </div>

        <div class="form-group">
            <label>13. Uraian dan Volume Pekerjaan</label>

            <textarea
                name="uraian_pekerjaan"
                rows="3"
            >{{ old('uraian_pekerjaan', $data->uraian_pekerjaan) }}</textarea>
        </div>

        <div class="form-group">

            <label>14. Tata Cara dan Syarat Pembayaran</label>

            <select name="syarat_pembayaran">
                <option
                    value="Sekaligus"
                    {{ old('syarat_pembayaran', $data->syarat_pembayaran) == 'Sekaligus' ? 'selected' : '' }}
                >
                    a. Sekaligus
                </option>

                <option
                    value="Termin"
                    {{ old('syarat_pembayaran', $data->syarat_pembayaran) == 'Termin' ? 'selected' : '' }}
                >
                    b. Termin
                </option>
            </select>

        </div>

        <div class="form-group">

            <label>Uang Muka</label>

            <table>

                <thead>
                    <tr>
                        <th>Termin</th>
                        <th>Ya / Tidak</th>
                        <th>Nilai</th>
                        <th>Fisik (%)</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>Uang Muka</td>

                        <td>
                            <input
                                type="text"
                                name="umk_status"
                                value="{{ old('umk_status', $data->umk_status) }}"
                            >
                        </td>

                        <td>
                            <input
                                type="number"
                                name="umk_nilai"
                                value="{{ old('umk_nilai', $data->umk_nilai) }}"
                            >
                        </td>

                        <td>
                            <input
                                type="text"
                                name="umk_fisik"
                                value="{{ old('umk_fisik', $data->umk_fisik) }}"
                            >
                        </td>
                    </tr>

                    <tr>
                        <td>Termin I</td>

                        <td>
                            <input
                                type="text"
                                name="t1_status"
                                value="{{ old('t1_status', $data->t1_status) }}"
                            >
                        </td>

                        <td>
                            <input
                                type="number"
                                name="termin1"
                                value="{{ old('termin1', $data->termin1) }}"
                            >
                        </td>

                        <td>
                            <input
                                type="text"
                                name="fisik1"
                                value="{{ old('fisik1', $data->fisik1) }}"
                            >
                        </td>
                    </tr>

                    <tr>
                        <td>Termin II</td>

                        <td>
                            <input
                                type="text"
                                name="t2_status"
                                value="{{ old('t2_status', $data->t2_status) }}"
                            >
                        </td>

                        <td>
                            <input
                                type="number"
                                name="termin2"
                                value="{{ old('termin2', $data->termin2) }}"
                            >
                        </td>

                        <td>
                            <input
                                type="text"
                                name="fisik2"
                                value="{{ old('fisik2', $data->fisik2) }}"
                            >
                        </td>
                    </tr>

                    <tr>
                        <td><strong>JUMLAH</strong></td>

                        <td></td>

                        <td>
                            <input
                                type="number"
                                name="total_pembayaran"
                                value="{{ old('total_pembayaran', $data->total_pembayaran) }}"
                            >
                        </td>

                        <td></td>
                    </tr>

                </tbody>

            </table>

        </div>

        <div class="form-group">
            <label>Nomor SPM Kantor</label>

            <input
                type="text"
                name="no_spm"
                value="{{ old('no_spm', $data->no_spm) }}"
            >
        </div>

        <div class="form-group">
            <label>Tanggal SPM Kantor</label>

            <input
                type="date"
                name="tgl_spm"
                value="{{ old('tgl_spm', $data->tgl_spm) }}"
            >
        </div>

        <div class="form-group">
            <label>15. Nilai SPM yang Diminta</label>

            <input
                type="number"
                id="nilai_spm"
                name="nilai_spm"
                value="{{ old('nilai_spm', $data->nilai_spm) }}"
                oninput="validasiSpm()"
            >
        </div>

        <div class="form-group">
            <label>Terbilang Nilai SPM</label>

            <textarea
                name="terbilang_spm"
                rows="2"
            >{{ old('terbilang_spm', $data->terbilang_spm) }}</textarea>
        </div>

        <div class="form-group">
            <label>16. Untuk Permintaan Pembayaran</label>

            <input
                type="text"
                name="pembayaran_untuk"
                value="{{ old('pembayaran_untuk', $data->pembayaran_untuk) }}"
            >
        </div>

        <div class="form-group">
            <label>17. Jangka Waktu Pelaksanaan</label>

            <input
                type="number"
                name="jangka_waktu"
                value="{{ old('jangka_waktu', $data->jangka_waktu) }}"
            >
        </div>

        <div class="form-group">
            <label>18. Jangka Waktu Pelaksanaan Addendum</label>

            <input
                type="number"
                name="jangka_waktu_addendum"
                value="{{ old('jangka_waktu_addendum', $data->jangka_waktu_addendum) }}"
            >
        </div>

        <div class="form-group">
            <label>19. Tanggal Mulai Kerja</label>

            <input
                type="date"
                name="tgl_mulai"
                value="{{ old('tgl_mulai', $data->tgl_mulai) }}"
            >
        </div>

        <div class="form-group">
            <label>20. Tanggal Penyelesaian Pekerjaan</label>

            <input
                type="date"
                name="tgl_selesai"
                value="{{ old('tgl_selesai', $data->tgl_selesai) }}"
            >
        </div>

        <div class="form-group">
            <label>21. Tanggal Penyelesaian Addendum</label>

            <input
                type="date"
                name="tgl_selesai_addendum"
                value="{{ old('tgl_selesai_addendum', $data->tgl_selesai_addendum) }}"
            >
        </div>

        <div class="form-group">
            <label>22. Jangka Waktu Pemeliharaan</label>

            <input
                type="number"
                name="waktu_pemeliharaan"
                value="{{ old('waktu_pemeliharaan', $data->waktu_pemeliharaan) }}"
            >
        </div>

        <div class="form-group">
            <label>23. Ketentuan Sanksi</label>

            <textarea
                name="sanksi_denda"
                rows="3"
            >{{ old('sanksi_denda', $data->sanksi_denda) }}</textarea>
        </div>

        <div class="form-group">
            <label>24. Kode RUP / SIRUP</label>

            <input
                type="text"
                name="kode_rup"
                value="{{ old('kode_rup', $data->kode_rup) }}"
            >
        </div>

        <div class="form-group">
            <label>25. TKDN (%)</label>

            <input
                type="number"
                step="0.01"
                name="tkdn_persen"
                value="{{ old('tkdn_persen', $data->tkdn_persen) }}"
            >
        </div>

        <div style="margin-top: 25px;">

            <button
                type="submit"
                class="btn btn-update"
            >
                Update Data
            </button>

            <a
                href="{{ route('kegiatan.index') }}"
                class="btn btn-cancel"
            >
                Batal
            </a>

        </div>

    </form>

</div>

<script>
function validasiSpm()
{
    const kontrak = parseFloat(
        document.querySelector('[name="nilai_kontrak"]').value
    ) || 0;

    const spm = parseFloat(
        document.querySelector('[name="nilai_spm"]').value
    ) || 0;

    const tombol = document.querySelector('.btn-update');

    if (spm > kontrak && kontrak > 0) {
        tombol.disabled = true;
        tombol.style.background = '#999';
        tombol.innerText = 'Nilai SPM Melebihi Kontrak';
    } else {
        tombol.disabled = false;
        tombol.style.background = '#0d5c34';
        tombol.innerText = 'Update Data';
    }
}
</script>

</body>
</html>