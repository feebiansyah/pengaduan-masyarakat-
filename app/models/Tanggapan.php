<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
  use HasFactory;

  protected $fillable = [
    "petugas_id",
    "pengaduan_id",
    "tanggal_tanggapan",
    "tanggapan",
  ];

  public function petugas()
  {
    return $this->belongsTo(Petugas::class);
  }

  public function pengaduan()
  {
    return $this->belongsTo(Pengaduan::class);
  }
}
