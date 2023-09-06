<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduans extends Model
{
   protected $table = 'pengaduan';
    protected $fillable = ['cover','judul','nik','nama','status','foto','isi_laporan','kategori','id_petugas'];
}
