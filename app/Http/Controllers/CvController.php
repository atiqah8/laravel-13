<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Skill;

class CvController extends Controller
{
    public function index()
    {
        return view('cv', [
            'dataPortofolio' => Portofolio::orderByDesc('tahun')->orderByDesc('portofolio_id')->get(),
            'dataSkill'      => Skill::orderByDesc('level')->get(),
        ]);
    }
}
