@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 py-4" style="background-color: #f8fafc;">
    <!-- Card Utama Desain Bersih dengan Aksen Hijau -->
    <div class="card shadow-sm border-0 mb-4 rounded-3">
        <!-- Header Tabel dengan Kotak Ikon Hijau -->
        <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 me-3" style="color: #046A38 !important; background-color: rgba(4, 106, 56, 0.1) !important;">
                    <i class="fa-solid fa-clipboard-list fs-3"></i>
                </div>
                <div>
                    <h5 class="fw-bold text-dark mb-1" style="letter-spacing: -0.02em;">TABEL URAIAN KEGIATAN RESUME KONTRAK / SPK (25 POIN + SPM)</h5>
                    <p class="text-muted small mb-0">Ketik data uraian di bawah ini lalu klik tombol simpan untuk memasukkan ke database dashboard.</p>
                </div>
            </div>
            <div>
                <button type="submit" form="form-kontrak" id="btn-submit" class="btn btn-success px-4 py-2 fw-bold shadow-sm d-flex align-items-center rounded-3" style="background-color: #046A38; border-color: #046A38;">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Data Tabel
                </button>
            </div>
        </div>

        <div class="card-body p-0">
            <form id="form-kontrak" action="{{ route('kegiatan.store') }}" method="POST">
                @csrf

                <!-- Tabel Input Data Grid -->
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light text-secondary" style="background-color: #f1f5f9;">
                            <tr>
                                <th class="text-center py-3 fw-bold text-success" style="width: 8%; color: #046A38 !important;">NO</th>
                                <th class="fw-bold text-success" style="width: 32%; color: #046A38 !important;">URAIAN KEGIATAN</th>
                                <th class="pe-4 fw-bold text-success" style="width: 60%; color: #046A38 !important;">ISI KEGIATAN (KETIK DATA DI SINI)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- 1. No DPA SKPD -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">1</td>
                                <td class="fw-semibold text-dark">No DPA SKPD dan Tanggal DPA/DPPA</td>
                                <td class="pe-4 py-3">
                                    <div class="row g-2">
                                        <div class="col-md-8">
                                            <input type="text" name="no_dpa" class="form-control bg-light-focus" placeholder="Ketik No DPA SKPD di sini...">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="tgl_dpa" class="form-control bg-light-focus">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- 2. Nama dan Nomor Kegiatan -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">2</td>
                                <td class="fw-semibold text-dark">Nama dan Nomor Kegiatan</td>
                                <td class="pe-4 py-3">
                                    <textarea name="nama_kegiatan" class="form-control bg-light-focus" rows="2" placeholder="Ketik nama dan nomor kegiatan di sini (Bisa Enter/Spasi)..."></textarea>
                                </td>
                            </tr>

                            <!-- 3. Kegiatan / Sub Kegiatan -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">3</td>
                                <td class="fw-semibold text-dark">Kegiatan / Sub Kegiatan</td>
                                <td class="pe-4 py-3">
                                    <textarea name="sub_kegiatan" class="form-control bg-light-focus" rows="2" placeholder="Ketik kegiatan / sub kegiatan di sini (Bisa Enter/Spasi)..."></textarea>
                                </td>
                            </tr>

                            <!-- 4. Kode Belanja yang Dibebani -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">4</td>
                                <td class="fw-semibold text-dark">Kode Belanja yang Dibebani</td>
                                <td class="pe-4 py-3">
                                    <input type="text" name="kode_belanja" class="form-control bg-light-focus" placeholder="Ketik kode belanja yang dibebani di sini...">
                                </td>
                            </tr>

                            <!-- 5. Pagu Anggaran -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">5</td>
                                <td class="fw-semibold text-dark">Pagu Anggaran / Pagu Kegiatan</td>
                                <td class="pe-4 py-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted border-end-0">Rp</span>
                                        <input type="number" name="pagu_anggaran" class="form-control bg-light-focus border-start-0" placeholder="Ketik nominal pagu anggaran...">
                                    </div>
                                </td>
                            </tr>

                            <!-- 6. Nomor dan Tanggal SPK / Kontrak (Disesuaikan dengan Foto 3) -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">6</td>
                                <td class="fw-semibold text-dark">Nomor dan Tanggal SPK / Kontrak</td>
                                <td class="pe-4 py-3">
                                    <div class="row g-2">
                                        <div class="col-md-8">
                                            <input type="text" name="no_spk" class="form-control bg-light-focus" placeholder="Ketik Nomor SPK / Kontrak...">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="tgl_spk" class="form-control bg-light-focus">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- 7. Nomor dan Tanggal SPK / Kontrak Addendum -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">7</td>
                                <td class="fw-semibold text-dark">Nomor dan Tanggal SPK / Kontrak Addendum</td>
                                <td class="pe-4 py-3">
                                    <div class="row g-2">
                                        <div class="col-md-8">
                                            <input type="text" name="no_addendum" class="form-control bg-light-focus" placeholder="Ketik Nomor SPK / Kontrak Addendum jika ada...">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="tgl_addendum" class="form-control bg-light-focus">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- 8. Nama Kontraktor / Perusahaan -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">8</td>
                                <td class="fw-semibold text-dark">Nama Kontraktor / Perusahaan</td>
                                <td class="pe-4 py-3">
                                    <input type="text" name="nama_kontraktor" class="form-control bg-light-focus" placeholder="Ketik nama kontraktor / perusahaan...">
                                </td>
                            </tr>

                            <!-- 9. Alamat Kontraktor -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">9</td>
                                <td class="fw-semibold text-dark">Alamat Kontraktor</td>
                                <td class="pe-4 py-3">
                                    <textarea name="alamat_kontraktor" class="form-control bg-light-focus" rows="2" placeholder="Ketik alamat lengkap kontraktor..."></textarea>
                                </td>
                            </tr>

                            <!-- 10. NPWP -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">10</td>
                                <td class="fw-semibold text-dark">NPWP</td>
                                <td class="pe-4 py-3">
                                    <input type="text" name="npwp" class="form-control bg-light-focus" placeholder="Ketik NPWP Perusahaan...">
                                </td>
                            </tr>

                            <!-- 11. Nomor Rekening / Bank -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">11</td>
                                <td class="fw-semibold text-dark">Nomor Rekening / Bank</td>
                                <td class="pe-4 py-3">
                                    <input type="text" name="no_rekening_bank" class="form-control bg-light-focus" placeholder="Ketik nomor rekening & nama bank...">
                                </td>
                            </tr>

                            <!-- 12. Nilai SPK / Kontraktor (Pagu Pembatas) -->
                            <tr style="background-color: #fffbeb;">
                                <td class="text-center fw-bold text-warning fs-5" style="color: #d97706 !important;">12</td>
                                <td class="fw-bold text-warning" style="color: #d97706 !important;">Nilai SPK / Kontraktor (Batas Pagu)</td>
                                <td class="pe-4 py-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-warning border-warning border-end-0" style="color: #d97706 !important;">Rp</span>
                                        <input type="number" id="nilai_kontrak" name="nilai_kontrak" class="form-control border-warning border-start-0 fw-bold bg-white text-warning shadow-sm" style="color: #d97706 !important;" placeholder="Ketik Nilai Kontrak Maksimal" oninput="validasiSpm()" required>
                                    </div>
                                </td>
                            </tr>

                            <!-- 13. Uraian dan Volume Pekerjaan -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">13</td>
                                <td class="fw-semibold text-dark">Uraian dan Volume Pekerjaan</td>
                                <td class="pe-4 py-3">
                                    <textarea name="uraian_pekerjaan" class="form-control bg-light-focus" rows="2" placeholder="Ketik uraian dan volume pekerjaan..."></textarea>
                                </td>
                            </tr>

                            <!-- 14. Tata Cara dan Syarat Pembayaran -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">14</td>
                                <td class="fw-semibold text-dark">Tata Cara dan Syarat Pembayaran</td>
                                <td class="pe-4 py-3">
                                    <select name="syarat_pembayaran" class="form-select bg-light-focus">
                                        <option value="Sekaligus">a. Sekaligus</option>
                                        <option value="Termin">b. Termin</option>
                                    </select>
                                </td>
                            </tr>

                            <!-- FITUR TAMBAHAN: NOMOR & TANGGAL SPM KANTOR -->
                            <tr style="background-color: #eff6ff;">
                                <td class="text-center fw-bold text-primary fs-5"><i class="fa-solid fa-star"></i></td>
                                <td class="fw-bold text-primary">Nomor & Tanggal SPM Kantor (Fitur Tambahan)</td>
                                <td class="pe-4 py-3">
                                    <div class="row g-2">
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-text bg-primary text-white border-primary"><i class="fa-solid fa-file-invoice"></i></span>
                                                <input type="text" name="no_spm" class="form-control border-primary fw-bold bg-white" placeholder="Masukkan Nomor SPM Kantor">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="tgl_spm" class="form-control border-primary text-primary fw-bold bg-white">
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- 15. Nilai SPM yang Diminta (Pencairan) -->
                            <tr style="background-color: #f0fdf4;">
                                <td class="text-center fw-bold text-success fs-5" style="color: #16a34a !important;">15</td>
                                <td class="fw-bold text-success" style="color: #16a34a !important;">Nilai SPM yang Diminta (Pencairan)</td>
                                <td class="pe-4 py-3">
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-success border-success border-end-0" style="color: #16a34a !important;">Rp</span>
                                        <input type="number" id="nilai_spm" name="nilai_spm" class="form-control border-success border-start-0 fw-bold bg-white text-success shadow-sm" style="color: #16a34a !important;" placeholder="Ketik nilai pencairan yang diminta..." oninput="validasiSpm()" required>
                                    </div>
                                    <div id="box-error" class="mt-2" style="display: none;">
                                        <div class="alert alert-danger py-2 px-3 small mb-0 d-flex align-items-center rounded-3 border-0 shadow-sm">
                                            <i class="fa-solid fa-circle-xmark me-2 fs-5"></i>
                                            <span id="teks-error"></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Terbilang Nilai SPM -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">-</td>
                                <td class="fw-semibold text-dark">Terbilang (Nilai SPM)</td>
                                <td class="pe-4 py-3">
                                    <textarea name="terbilang_spm" class="form-control bg-light-focus" rows="2" placeholder="Ketik kalimat terbilang dari nilai SPM pencairan..."></textarea>
                                </td>
                            </tr>

                            <!-- 16. Untuk Permintaan Pembayaran -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">16</td>
                                <td class="fw-semibold text-dark">Untuk Permintaan Pembayaran</td>
                                <td class="pe-4 py-3">
                                    <input type="text" name="pembayaran_untuk" class="form-control bg-light-focus" placeholder="Contoh: Termin 2 (Kedua)...">
                                </td>
                            </tr>

                            <!-- 17. Jangka Waktu Pelaksanaan -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">17</td>
                                <td class="fw-semibold text-dark">Jangka Waktu Pelaksanaan</td>
                                <td class="pe-4 py-3">
                                    <div class="input-group">
                                        <input type="number" name="jangka_waktu" class="form-control bg-light-focus border-end-0" placeholder="Ketik jumlah hari...">
                                        <span class="input-group-text bg-light text-muted border-start-0">Hari Kalender</span>
                                    </div>
                                </td>
                            </tr>

                            <!-- 18. Jangka Waktu Pelaksanaan Addendum -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">18</td>
                                <td class="fw-semibold text-dark">Jangka Waktu Pelaksanaan Addendum</td>
                                <td class="pe-4 py-3">
                                    <div class="input-group">
                                        <input type="number" name="jangka_waktu_addendum" class="form-control bg-light-focus border-end-0" placeholder="Ketik jumlah hari jika ada...">
                                        <span class="input-group-text bg-light text-muted border-start-0">Hari Kalender</span>
                                    </div>
                                </td>
                            </tr>

                            <!-- 19. Tanggal Mulai Kerja -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">19</td>
                                <td class="fw-semibold text-dark">Tanggal Mulai Kerja</td>
                                <td class="pe-4 py-3">
                                    <input type="date" name="tgl_mulai" class="form-control bg-light-focus">
                                </td>
                            </tr>

                            <!-- 20. Tanggal Penyelesaian Pekerjaan -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">20</td>
                                <td class="fw-semibold text-dark">Tanggal Penyelesaian Pekerjaan</td>
                                <td class="pe-4 py-3">
                                    <input type="date" name="tgl_selesai" class="form-control bg-light-focus">
                                </td>
                            </tr>

                            <!-- 21. Tanggal Penyelesaian Addendum -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">21</td>
                                <td class="fw-semibold text-dark">Tanggal Penyelesaian Addendum</td>
                                <td class="pe-4 py-3">
                                    <input type="date" name="tgl_selesai_addendum" class="form-control bg-light-focus">
                                </td>
                            </tr>

                            <!-- 22. Jangka Waktu Pemeliharaan -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">22</td>
                                <td class="fw-semibold text-dark">Jangka Waktu Pemeliharaan</td>
                                <td class="pe-4 py-3">
                                    <div class="input-group">
                                        <input type="number" name="waktu_pemeliharaan" class="form-control bg-light-focus border-end-0" placeholder="Ketik jumlah hari...">
                                        <span class="input-group-text bg-light text-muted border-start-0">Hari Kalender</span>
                                    </div>
                                </td>
                            </tr>

                            <!-- 23. Ketentuan Sanksi -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">23</td>
                                <td class="fw-semibold text-dark">Ketentuan Sanksi</td>
                                <td class="pe-4 py-3">
                                    <textarea name="sanksi_denda" class="form-control bg-light-focus" rows="2" placeholder="Ketik ketentuan sanksi/denda..."></textarea>
                                </td>
                            </tr>

                            <!-- 24. Kode RUP / SIRUP -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">24</td>
                                <td class="fw-semibold text-dark">Kode RUP / SIRUP</td>
                                <td class="pe-4 py-3">
                                    <input type="text" name="kode_rup" class="form-control bg-light-focus" placeholder="Ketik Kode RUP / SIRUP...">
                                </td>
                            </tr>

                            <!-- 25. TKDN -->
                            <tr>
                                <td class="text-center fw-bold text-muted fs-5">25</td>
                                <td class="fw-semibold text-dark">TKDN</td>
                                <td class="pe-4 py-3">
                                    <div class="input-group">
                                        <input type="number" name="tkdn_persen" class="form-control bg-light-focus border-end-0" placeholder="Contoh: 50">
                                        <span class="input-group-text bg-light text-muted border-start-0">%</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Aksi -->
                <div class="card-footer bg-white py-3 border-top d-flex justify-content-end pe-4">
                    <button type="submit" class="btn btn-success px-5 py-2 fw-bold shadow-sm rounded-3" style="background-color: #046A38; border-color: #046A38;">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Data Tabel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Styling Kustom Elemen Form Supaya Rapi */
    .form-control, .form-select {
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 0.55rem 0.75rem;
        font-size: 0.925rem;
        background-color: #ffffff;
        color: #334155;
        transition: all 0.2s ease-in-out;
    }
    
    .bg-light-focus:focus {
        background-color: #ffffff !important;
        border-color: #046A38 !important;
        box-shadow: 0 0 0 3px rgba(4, 106, 56, 0.15) !important;
    }

    .table th {
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .table td {
        padding-top: 0.85rem;
        padding-bottom: 0.85rem;
        border-bottom: 1px solid #f1f5f9;
    }

    /* Modifikasi CSS Sidebar Active di Layout Utama Anda */
    /* Pastikan class active menu sidebar menggunakan warna #046A38 atau class .bg-success dari bootstrap */
</style>

<script>
function validasiSpm() {
    let kontrak = parseFloat(document.getElementById('nilai_kontrak').value) || 0;
    let spm = parseFloat(document.getElementById('nilai_spm').value) || 0;
    
    let boxError = document.getElementById('box-error');
    let btnSubmit = document.getElementById('btn-submit');
    let teksError = document.getElementById('teks-error');

    if (spm > kontrak) {
        teksError.innerHTML = "<strong>Sistem Menolak!</strong> Nilai pencairan SPM (Rp " + spm.toLocaleString('id-ID') + ") melewati nilai batas pagu Kontrak (Rp " + kontrak.toLocaleString('id-ID') + ").";
        boxError.style.display = 'block';
        btnSubmit.disabled = true;
        btnSubmit.style.backgroundColor = '#64748b';
        btnSubmit.style.borderColor = '#64748b';
    } else {
        boxError.style.display = 'none';
        btnSubmit.disabled = false;
        btnSubmit.style.backgroundColor = '#046A38';
        btnSubmit.style.borderColor = '#046A38';
    }
}
</script>
@endsection