<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
    use HasFactory;
    protected $table = 'sarana_prasarana';
    protected $primaryKey = 'id_sarana';
    protected $fillable = [
        'nama_sarana', 
        'jumlah',
        'kondisi', 
        'foto'
    ];
}
