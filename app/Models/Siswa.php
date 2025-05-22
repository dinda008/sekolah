<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nama_siswa',
        'nisn',
        'nis',
        'tanggal_lahir',
        'id_kelas',
        'id_tahun_ajaran'
    ];

    public function kelas()
{
    return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
}

public function tahunAjaran()
{
    return $this->belongsTo(TahunAjaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
}

}
