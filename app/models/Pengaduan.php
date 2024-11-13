<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Masyarakat;

class Pengaduan extends Model
{
  use HasFactory;
  protected $table = "pengaduans";

  protected $fillable = [
    "masyarakat_id",
    "tgl_pengaduan",
    "isi_laporan",
    "foto",
    "status",
  ];

  public function masyarakat()
  {
    return $this->belongsTo(Masyarakat::class, 'masyarakat_id');
  }

  public function tanggapan()
  {
    return $this->hasMany(Tanggapan::class);
  }
}
