<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Pastikan nama tabelnya sesuai dengan yang ada di database Anda
    protected $table = 'kegiatans';

    // Izinkan semua kolom diisi agar form tambah/edit bekerja
    protected $guarded = [];
}