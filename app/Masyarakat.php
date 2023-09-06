<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Masyarakat extends Model
{
	protected $table = 'users';
    protected $fillable = [
        'nik','telp','name', 'email', 'password','level','foto'
    ];
}
