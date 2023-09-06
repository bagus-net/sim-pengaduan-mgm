<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapans extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = ['cover','judul','nik','nama','foto','isi_laporan','kategori','id_petugas'];
}
