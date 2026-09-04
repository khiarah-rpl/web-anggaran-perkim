<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->string('kode_belanja')->nullable();
            $table->decimal('pagu_anggaran', 20, 2)->nullable();

            $table->string('no_spk')->nullable();
            $table->date('tgl_spk')->nullable();

            $table->string('no_addendum')->nullable();
            $table->date('tgl_addendum')->nullable();

            $table->string('nama_kontraktor')->nullable();
            $table->text('alamat_kontraktor')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_rekening_bank')->nullable();

            $table->decimal('nilai_kontrak', 20, 2)->nullable();
            $table->text('uraian_pekerjaan')->nullable();
            $table->text('syarat_pembayaran')->nullable();

            $table->string('umk_status')->nullable();
            $table->decimal('umk_nilai', 20, 2)->nullable();
            $table->decimal('umk_fisik', 8, 2)->nullable();

            $table->string('t1_status')->nullable();
            $table->decimal('termin1', 20, 2)->nullable();
            $table->decimal('fisik1', 8, 2)->nullable();

            $table->string('t2_status')->nullable();
            $table->decimal('termin2', 20, 2)->nullable();
            $table->decimal('fisik2', 8, 2)->nullable();

            $table->decimal('total_pembayaran', 20, 2)->nullable();

            $table->string('no_spm')->nullable();
            $table->date('tgl_spm')->nullable();
            $table->text('terbilang_spm')->nullable();
            $table->text('pembayaran_untuk')->nullable();

            $table->string('jangka_waktu')->nullable();
            $table->string('jangka_waktu_addendum')->nullable();

            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->date('tgl_selesai_addendum')->nullable();

            $table->string('waktu_pemeliharaan')->nullable();
            $table->text('sanksi_denda')->nullable();

            $table->string('kode_rup')->nullable();
            $table->decimal('tkdn_persen', 8, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('kegiatans', function (Blueprint $table) {
            $table->dropColumn([
                'kode_belanja',
                'pagu_anggaran',
                'no_spk',
                'tgl_spk',
                'no_addendum',
                'tgl_addendum',
                'nama_kontraktor',
                'alamat_kontraktor',
                'npwp',
                'no_rekening_bank',
                'nilai_kontrak',
                'uraian_pekerjaan',
                'syarat_pembayaran',
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
                'no_spm',
                'tgl_spm',
                'terbilang_spm',
                'pembayaran_untuk',
                'jangka_waktu',
                'jangka_waktu_addendum',
                'tgl_mulai',
                'tgl_selesai',
                'tgl_selesai_addendum',
                'waktu_pemeliharaan',
                'sanksi_denda',
                'kode_rup',
                'tkdn_persen'
            ]);
        });
    }
};