<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = [
        'nama', 
        'nip', 
        'id_jabatan',
        'foto',
        'sambutan'
    ];
    public function jabatan()
{
    return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
}

// Untuk mengecek pegawai ini adalah kepsek atau bukan 
public function isKepalaSekolah()
    {
        return $this->jabatan->nama_jabatan === 'Kepala Sekolah';
    }
}
