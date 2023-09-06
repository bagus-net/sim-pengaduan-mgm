<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
   protected $table = 'pengumuman';
   protected $fillable = ['nama','level','isi','judul'];
}
