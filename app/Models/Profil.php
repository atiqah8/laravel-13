<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'Profil_1027';
    protected $primaryKey = 'profil_id';
    protected $fillable = [
        'nama',
        'peran',
        'tentang',
        'email',
        'lokasi',
        'foto',
    ];
}
