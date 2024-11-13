<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory;
    protected $table = 'masyarakats';

    protected $fillable = [
        'nik', 'nama_lengkap', 'username', 'password', 'no_telp',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }
}
