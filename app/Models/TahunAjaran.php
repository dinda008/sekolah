<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    public $timestamps = false;

    protected $fillable = ['nama_tahun'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
    }
}
