<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
  use HasFactory;

  protected $fillable = [
    "nama_petugas",
    "username",
    "password",
    "no_telp",
    "level",
  ];

  protected $hidden = ["password", "remember_token"];

  public function tanggapan()
  {
    return $this->hasMany(Tanggapan::class);
  }
}
