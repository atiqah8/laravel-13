<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    private function aturan(): array
    {
        return [
            'nama'  => 'required|string|max:100',
            'level' => 'required|integer|min:0|max:100',
        ];
    }

    public function index()
    {
        $data['dataSkill'] = Skill::orderByDesc('level')->get();
        return view('admin.skill.index', $data);
    }

    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->aturan());
        Skill::create($request->only(['nama', 'level']));

        return redirect()->route('skill.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
        $data['item'] = Skill::findOrFail($id);
        return view('admin.skill.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate($this->aturan());
        Skill::findOrFail($id)->update($request->only(['nama', 'level']));

        return redirect()->route('skill.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Skill::findOrFail($id)->delete();

        return redirect()->route('skill.index')->with('success', 'Data berhasil dihapus');
    }
}
