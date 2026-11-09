<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'Portofolio_1027';
    protected $primaryKey = 'portofolio_id';
    protected $fillable = [
        'judul',
        'deskripsi',
        'teknologi',
        'tahun',
        'link',
        'gambar',
    ];
}
