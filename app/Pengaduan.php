<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = ['cover','judul','nik','nama','foto','isi_laporan','kategori','id_petugas'];
}
