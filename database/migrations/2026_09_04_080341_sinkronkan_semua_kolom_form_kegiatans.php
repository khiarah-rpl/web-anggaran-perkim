<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = [
            'nomor_tanggal_kontrak' => function (Blueprint $table) {
                $table->text('nomor_tanggal_kontrak')->nullable();
            },

            'nomor_tanggal_addendum' => function (Blueprint $table) {
                $table->text('nomor_tanggal_addendum')->nullable();
            },

            'nama_direktur_perusahaan' => function (Blueprint $table) {
                $table->string('nama_direktur_perusahaan')->nullable();
            },

            'nama_alamat_penyedia' => function (Blueprint $table) {
                $table->text('nama_alamat_penyedia')->nullable();
            },

            'npwp_penyedia' => function (Blueprint $table) {
                $table->string('npwp_penyedia')->nullable();
            },

            'nomor_rekening_bank' => function (Blueprint $table) {
                $table->string('nomor_rekening_bank')->nullable();
            },

            'nilai_kontrak_awal' => function (Blueprint $table) {
                $table->decimal('nilai_kontrak_awal', 20, 2)->nullable();
            },

            'kegiatan' => function (Blueprint $table) {
                $table->text('kegiatan')->nullable();
            },

            'umk_status' => function (Blueprint $table) {
                $table->string('umk_status')->nullable();
            },

            'umk_nilai' => function (Blueprint $table) {
                $table->decimal('umk_nilai', 20, 2)->nullable();
            },

            'umk_fisik' => function (Blueprint $table) {
                $table->decimal('umk_fisik', 8, 2)->nullable();
            },

            't1_status' => function (Blueprint $table) {
                $table->string('t1_status')->nullable();
            },

            'termin1' => function (Blueprint $table) {
                $table->decimal('termin1', 20, 2)->nullable();
            },

            'fisik1' => function (Blueprint $table) {
                $table->decimal('fisik1', 8, 2)->nullable();
            },

            't2_status' => function (Blueprint $table) {
                $table->string('t2_status')->nullable();
            },

            'termin2' => function (Blueprint $table) {
                $table->decimal('termin2', 20, 2)->nullable();
            },

            'fisik2' => function (Blueprint $table) {
                $table->decimal('fisik2', 8, 2)->nullable();
            },

            'total_pembayaran' => function (Blueprint $table) {
                $table->decimal('total_pembayaran', 20, 2)->nullable();
            },

            'terbilang_spm' => function (Blueprint $table) {
                $table->text('terbilang_spm')->nullable();
            },

            'jangka_waktu' => function (Blueprint $table) {
                $table->string('jangka_waktu')->nullable();
            },

            'jangka_waktu_hari' => function (Blueprint $table) {
                $table->string('jangka_waktu_hari')->nullable();
            },

            'jangka_waktu_addendum' => function (Blueprint $table) {
                $table->string('jangka_waktu_addendum')->nullable();
            },

            'tanggal_mulai_kerja' => function (Blueprint $table) {
                $table->date('tanggal_mulai_kerja')->nullable();
            },

            'tanggal_selesai_kerja' => function (Blueprint $table) {
                $table->date('tanggal_selesai_kerja')->nullable();
            },

            'tanggal_selesai_addendum' => function (Blueprint $table) {
                $table->date('tanggal_selesai_addendum')->nullable();
            },

            'jaminan_pemeliharaan' => function (Blueprint $table) {
                $table->string('jaminan_pemeliharaan')->nullable();
            },

            'sanksi_denda_telat' => function (Blueprint $table) {
                $table->text('sanksi_denda_telat')->nullable();
            },

            'kode_rup' => function (Blueprint $table) {
                $table->string('kode_rup')->nullable();
            },

            'tkdn' => function (Blueprint $table) {
                $table->string('tkdn')->nullable();
            },
        ];

        foreach ($columns as $column => $definition) {
            if (!Schema::hasColumn('kegiatans', $column)) {
                Schema::table('kegiatans', $definition);
            }
        }
    }

    public function down(): void
    {
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
            'tkdn',
        ];

        foreach ($columns as $column) {
            if (Schema::hasColumn('kegiatans', $column)) {
                Schema::table('kegiatans', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }
};