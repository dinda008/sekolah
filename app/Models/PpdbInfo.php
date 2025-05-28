<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpdbInfo extends Model
{
    protected $table = 'ppdb_infos';
    protected $primaryKey = 'id_ppdb';
    protected $fillable = [
        'poster',
        'formulir',
        'syarat_ketentuan', // ditambahkan agar bisa disimpan ke database
    ];
}
