<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'Pendidikan_1027';
    protected $primaryKey = 'pendidikan_id';
    protected $fillable = [
        'institusi',
        'jurusan',
        'tahun_masuk',
        'tahun_lulus',
        'keterangan',
    ];
}
