<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontraks', function (Blueprint $table) {
            $table->id();
            
            // 1 s.d. 12: DATA UTAMA KONTRAK (Dari Fisik Kertas Atas)
            $table->string('program_kegiatan')->nullable();          // 1. Program Kegiatan
            $table->string('sub_kegiatan')->nullable();              // 2. Sub Kegiatan
            $table->string('pekerjaan_kegiatan')->nullable();        // 3. Pekerjaan Kegiatan
            $table->string('nomor_tanggal_dpa')->nullable();         // 4. Nomor/Tanggal DPA-OPD
            $table->string('nomor_tanggal_kontrak')->nullable();     // 5. Nomor/Tanggal Kontrak
            $table->string('nomor_tanggal_addendum')->nullable();    // 6. Nomor/Tanggal Addendum (Jika ada)
            $table->double('nilai_kontrak_awal')->default(0);        // 7. Nilai Kontrak Awal
            $table->double('nilai_kontrak_addendum')->nullable();    // 8. Nilai Kontrak Addendum (Jika ada)
            $table->string('nama_alamat_penyedia')->nullable();      // 9. Nama & Alamat Penyedia
            $table->string('nomor_rekening_bank')->nullable();       // 10. Nomor Rekening Bank Penyedia
            $table->string('npwp_penyedia')->nullable();             // 11. NPWP Penyedia
            $table->string('sanksi_denda_telat')->nullable();        // 12. Sanksi atau Denda Keterlambatan

            // 13 s.d. 17: DETAIL PEKERJAAN & PENCAIRAN (Bagian Tengah Kertas)
            $table->text('kegiatan');                                // 13. Uraian dan Volume Pekerjaan
            $table->string('termin');                                // 14. Tata Cara & Syarat Pembayaran
            $table->string('nomor_spm')->nullable();                 // * Tambahan: Nomor SPM
            $table->date('tanggal_spm')->nullable();                 // * Tambahan: Tanggal SPM
            $table->double('nilai_spm')->default(0);                 // 15. Nilai SPM yang Diminta (Pencairan)
            $table->text('terbilang_spm')->nullable();               // * Tambahan: Terbilang (Nilai SPM)
            $table->string('jangka_waktu')->nullable();              // 16. Untuk Permintaan Pembayaran (Termin)
            $table->string('jangka_waktu_hari')->nullable();         // 17. Jangka Waktu Pelaksanaan (Hari Kalender)

            // 18 s.d. 25: DATA PENDUKUNG & TANDA TANGAN (Bagian Bawah Kertas)
            $table->date('tanggal_mulai_kerja')->nullable();         // 18. Tanggal Mulai Kerja
            $table->date('tanggal_selesai_kerja')->nullable();       // 19. Tanggal Selesai Kerja
            $table->string('nomor_tanggal_bast')->nullable();        // 20. Nomor & Tanggal BAST-HP
            $table->string('nomor_tanggal_bap')->nullable();         // 21. Nomor & Tanggal BAP
            $table->string('jaminan_pemeliharaan')->nullable();      // 22. Jaminan Pemeliharaan (Ada/Tidak)
            $table->string('nama_nip_pptk')->nullable();             // 23. Nama & NIP PPTK Dinas
            $table->string('nama_nip_kpa')->nullable();              // 24. Nama & NIP KPA / Pengguna Anggaran
            $table->string('nama_direktur_perusahaan')->nullable();  // 25. Nama Direktur/Penyedia Jasa

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontraks');
    }
};