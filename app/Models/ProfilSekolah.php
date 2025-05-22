<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;
    protected $table = 'profil_sekolah';
    protected $primaryKey = 'id_profil';
    protected $fillable = [
        'visi', 
        'misi', 
        'tujuan'
    ];

}
