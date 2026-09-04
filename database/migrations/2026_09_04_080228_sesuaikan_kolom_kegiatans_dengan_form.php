<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {

            // Data DPA
            if (!Schema::hasColumn('kegiatans', 'nomor_tanggal_dpa')) {
                $table->text('nomor_tanggal_dpa')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'program_kegiatan')) {
                $table->text('program_kegiatan')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'sub_kegiatan')) {
                $table->text('sub_kegiatan')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'kode_belanja')) {
                $table->string('kode_belanja')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'pagu_anggaran')) {
                $table->decimal('pagu_anggaran', 20, 2)->nullable();
            }


            // SPK / Kontrak
            if (!Schema::hasColumn('kegiatans', 'nomor_tanggal_kontrak')) {
                $table->text('nomor_tanggal_kontrak')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'nomor_tanggal_addendum')) {
                $table->text('nomor_tanggal_addendum')->nullable();
            }


            // Penyedia / Kontraktor
            if (!Schema::hasColumn('kegiatans', 'nama_direktur_perusahaan')) {
                $table->string('nama_direktur_perusahaan')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'nama_alamat_penyedia')) {
                $table->text('nama_alamat_penyedia')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'npwp_penyedia')) {
                $table->string('npwp_penyedia')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'nomor_rekening_bank')) {
                $table->string('nomor_rekening_bank')->nullable();
            }


            // Nilai kontrak dan uraian
            if (!Schema::hasColumn('kegiatans', 'nilai_kontrak_awal')) {
                $table->decimal('nilai_kontrak_awal', 20, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'kegiatan')) {
                $table->text('kegiatan')->nullable();
            }


            // Pembayaran
            if (!Schema::hasColumn('kegiatans', 'umk_status')) {
                $table->string('umk_status')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'umk_nilai')) {
                $table->decimal('umk_nilai', 20, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'umk_fisik')) {
                $table->decimal('umk_fisik', 8, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 't1_status')) {
                $table->string('t1_status')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'termin1')) {
                $table->decimal('termin1', 20, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'fisik1')) {
                $table->decimal('fisik1', 8, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 't2_status')) {
                $table->string('t2_status')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'termin2')) {
                $table->decimal('termin2', 20, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'fisik2')) {
                $table->decimal('fisik2', 8, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'total_pembayaran')) {
                $table->decimal('total_pembayaran', 20, 2)->nullable();
            }


            // SPM
            if (!Schema::hasColumn('kegiatans', 'nilai_spm')) {
                $table->decimal('nilai_spm', 20, 2)->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'terbilang_spm')) {
                $table->text('terbilang_spm')->nullable();
            }


            // Pelaksanaan
            if (!Schema::hasColumn('kegiatans', 'jangka_waktu')) {
                $table->string('jangka_waktu')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'jangka_waktu_hari')) {
                $table->string('jangka_waktu_hari')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'jangka_waktu_addendum')) {
                $table->string('jangka_waktu_addendum')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'tanggal_mulai_kerja')) {
                $table->date('tanggal_mulai_kerja')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'tanggal_selesai_kerja')) {
                $table->date('tanggal_selesai_kerja')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'tanggal_selesai_addendum')) {
                $table->date('tanggal_selesai_addendum')->nullable();
            }


            // Pemeliharaan dan sanksi
            if (!Schema::hasColumn('kegiatans', 'jaminan_pemeliharaan')) {
                $table->string('jaminan_pemeliharaan')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'sanksi_denda_telat')) {
                $table->text('sanksi_denda_telat')->nullable();
            }


            // Pengadaan
            if (!Schema::hasColumn('kegiatans', 'kode_rup')) {
                $table->string('kode_rup')->nullable();
            }

            if (!Schema::hasColumn('kegiatans', 'tkdn')) {
                $table->string('tkdn')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {

            $columns = [
                'nomor_tanggal_kontrak',
                'nomor_tanggal_addendum',
                'nama_direktur_perusahaan',
                'nama_alamat_penyedia',
                'npwp_penyedia',
                'nomor_rekening_bank',
                'nilai_kontrak_awal',
                'kegiatan',
                'umk_status',
                'umk_nilai',
                'umk_fisik',
                't1_status',
                'termin1',
                'fisik1',
                't2_status',
                'termin2',
                'fisik2',
                'total_pembayaran',
                'terbilang_spm',
                'jangka_waktu',
                'jangka_waktu_hari',
                'jangka_waktu_addendum',
                'tanggal_mulai_kerja',
                'tanggal_selesai_kerja',
                'tanggal_selesai_addendum',
                'jaminan_pemeliharaan',
                'sanksi_denda_telat',
                'kode_rup',
                'tkdn'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('kegiatans', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};