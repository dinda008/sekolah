<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita'; 
    protected $primaryKey = 'id_berita';
    protected $fillable = [
    'judul_berita', 
    'tanggal', 
    'deskripsi_berita', 
    'foto', 
    'id_pegawai'
]; 

    // Relasi ke tabel Pegawai (Penulis berita)
    public function penulis()
{
    return $this->belongsTo(Pegawai::class, 'id_pegawai');
}

}
