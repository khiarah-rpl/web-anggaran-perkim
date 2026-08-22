<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('kontraks', function (Blueprint $table) {
            $table->string('kode_belanja')->nullable();
            $table->decimal('pagu_anggaran', 15, 2)->nullable();
            $table->string('kode_rup')->nullable();
            $table->integer('tkdn')->nullable();
            $table->string('jangka_waktu_addendum')->nullable();
            $table->date('tanggal_selesai_addendum')->nullable();
        });
    }

    public function down()
    {
        Schema::table('kontraks', function (Blueprint $table) {
            $table->dropColumn(['kode_belanja', 'pagu_anggaran', 'kode_rup', 'tkdn', 'jangka_waktu_addendum', 'tanggal_selesai_addendum']);
        });
    }
};