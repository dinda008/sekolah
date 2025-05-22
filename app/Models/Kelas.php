<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['nama_kelas'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id_kelas');
    }

    
public function tahunAjaran()
{
    return $this->belongsTo(TahunAjaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
}
}
