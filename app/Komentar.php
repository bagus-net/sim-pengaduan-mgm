<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = ['name','foto','id_pengaduan','komentar'];
}
