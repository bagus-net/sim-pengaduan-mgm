<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'users';
    protected $fillable = ['nik','foto','name','email','role','password','telp'];
}

