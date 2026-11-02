<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Portofolio;
use App\Models\Profil;
use App\Models\Skill;

class CvController extends Controller
{
    public function index()
    {
        $p = Profil::first();

        // Data diri diambil dari tabel Profil_1027 (ubah lewat /admin/profil).
        // Kalau belum diisi, dipakai nilai awal di bawah ini.
        $profil = [
            'nama'    => $p->nama    ?? 'Atiqah Nur Aqillah',
            'peran'   => $p->peran   ?? 'Mahasiswa Teknik Informatika',
            'tentang' => $p->tentang ?? 'Mahasiswa yang suka membangun aplikasi web dengan Laravel dan MySQL.',
            'email'   => $p->email   ?? 'atiqah25ti@mahasiswa.pcr.ac.id',
            'lokasi'  => $p->lokasi  ?? 'Indonesia',
            'foto'    => $p->foto    ?? null,
        ];

        return view('cv', [
            'profil'         => $profil,
            'dataPendidikan' => Pendidikan::orderByDesc('tahun_masuk')->get(),
            'dataPortofolio' => Portofolio::orderByDesc('tahun')->orderByDesc('portofolio_id')->get(),
            'dataSkill'      => Skill::orderByDesc('level')->get(),
        ]);
    }
}
