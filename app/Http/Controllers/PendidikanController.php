<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    private function aturan(): array
    {
        return [
            'institusi'   => 'required|string|max:150',
            'jurusan'     => 'required|string|max:150',
            'tahun_masuk' => 'required|digits:4',
            'tahun_lulus' => 'nullable|digits:4|gte:tahun_masuk',
            'keterangan'  => 'nullable|string',
        ];
    }

    private function ambil(Request $request): array
    {
        return $request->only(['institusi', 'jurusan', 'tahun_masuk', 'tahun_lulus', 'keterangan']);
    }

    public function index()
    {
        $data['dataPendidikan'] = Pendidikan::orderByDesc('tahun_masuk')->get();
        return view('admin.pendidikan.index', $data);
    }

    public function create()
    {
        return view('admin.pendidikan.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->aturan());
        Pendidikan::create($this->ambil($request));

        return redirect()->route('pendidikan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
        $data['item'] = Pendidikan::findOrFail($id);
        return view('admin.pendidikan.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate($this->aturan());
        Pendidikan::findOrFail($id)->update($this->ambil($request));

        return redirect()->route('pendidikan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        Pendidikan::findOrFail($id)->delete();

        return redirect()->route('pendidikan.index')->with('success', 'Data berhasil dihapus');
    }
}
