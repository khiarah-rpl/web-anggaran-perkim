<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('no_dpa')->nullable();
            $table->date('tgl_dpa')->nullable();
            $table->text('nama_kegiatan')->nullable();
            $table->text('sub_kegiatan')->nullable();
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
            $table->string('syarat_pembayaran')->nullable();

            $table->string('umk_status')->nullable();
            $table->decimal('umk_nilai', 20, 2)->nullable();
            $table->string('umk_fisik')->nullable();

            $table->string('t1_status')->nullable();
            $table->decimal('termin1', 20, 2)->nullable();
            $table->string('fisik1')->nullable();

            $table->string('t2_status')->nullable();
            $table->decimal('termin2', 20, 2)->nullable();
            $table->string('fisik2')->nullable();

            $table->decimal('total_pembayaran', 20, 2)->nullable();

            $table->string('no_spm')->nullable();
            $table->date('tgl_spm')->nullable();
            $table->decimal('nilai_spm', 20, 2)->nullable();
            $table->text('terbilang_spm')->nullable();
            $table->text('pembayaran_untuk')->nullable();
            $table->integer('jangka_waktu')->nullable();
            $table->integer('jangka_waktu_addendum')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->date('tgl_selesai_addendum')->nullable();
            $table->integer('waktu_pemeliharaan')->nullable();
            $table->text('sanksi_denda')->nullable();
            $table->string('kode_rup')->nullable();
            $table->decimal('tkdn_persen', 5, 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};