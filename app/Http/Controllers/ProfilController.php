<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfilController extends Controller
{
    private string $folder = 'uploads/profil';

    private function hapusFoto(?string $nama): void
    {
        if ($nama && is_file(public_path($this->folder . '/' . $nama))) {
            unlink(public_path($this->folder . '/' . $nama));
        }
    }

    public function edit()
    {
        $data['item'] = Profil::first();
        return view('admin.profil.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:150',
            'peran'   => 'required|string|max:150',
            'tentang' => 'nullable|string',
            'email'   => 'nullable|email|max:255',
            'lokasi'  => 'nullable|string|max:100',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $item = Profil::first() ?? new Profil();
        $item->fill($request->only(['nama', 'peran', 'tentang', 'email', 'lokasi']));

        if ($request->hasFile('foto')) {
            $this->hapusFoto($item->foto);
            $file = $request->file('foto');
            $nama = time() . '_' . Str::random(6) . '.' . $file->extension();
            $file->move(public_path($this->folder), $nama);
            $item->foto = $nama;
        } elseif ($request->boolean('hapus_foto')) {
            $this->hapusFoto($item->foto);
            $item->foto = null;
        }

        $item->save();

        return redirect()->route('profil.edit')->with('success', 'Profil berhasil disimpan!');
    }
}
