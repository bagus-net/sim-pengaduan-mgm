<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'users';
    protected $fillable = ['nama_perusahaan','foto','name','email','role','password','telp'];
}

