<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    private string $folder = 'uploads/portofolio';

    private function aturan(): array
    {
        return [
            'judul'     => 'required|string|max:150',
            'deskripsi' => 'required|string',
            'teknologi' => 'nullable|string|max:150',
            'tahun'     => 'required|digits:4',
            'link'      => 'nullable|url|max:255',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    private function simpanGambar($file): string
    {
        $nama = time() . '_' . Str::random(6) . '.' . $file->extension();
        $file->move(public_path($this->folder), $nama);
        return $nama;
    }

    private function hapusGambar(?string $nama): void
    {
        if ($nama && is_file(public_path($this->folder . '/' . $nama))) {
            unlink(public_path($this->folder . '/' . $nama));
        }
    }

    // READ (daftar)
    public function index()
    {
        $data['dataPortofolio'] = Portofolio::orderByDesc('portofolio_id')->get();
        return view('admin.portofolio.index', $data);
    }

    public function create()
    {
        return view('admin.portofolio.create');
    }

    // CREATE
    public function store(Request $request)
    {
        $request->validate($this->aturan());

        $data = $request->only(['judul', 'deskripsi', 'teknologi', 'tahun', 'link']);
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->simpanGambar($request->file('gambar'));
        }
        Portofolio::create($data);

        return redirect()->route('portofolio.index')->with('success', 'Penambahan Data Berhasil!');
    }

    public function edit(string $id)
    {
        $data['item'] = Portofolio::findOrFail($id);
        return view('admin.portofolio.edit', $data);
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $request->validate($this->aturan());

        $item = Portofolio::findOrFail($id);
        $data = $request->only(['judul', 'deskripsi', 'teknologi', 'tahun', 'link']);

        if ($request->hasFile('gambar')) {
            // ganti gambar lama dengan yang baru
            $this->hapusGambar($item->gambar);
            $data['gambar'] = $this->simpanGambar($request->file('gambar'));
        } elseif ($request->boolean('hapus_gambar')) {
            // exclude: hapus gambar saja
            $this->hapusGambar($item->gambar);
            $data['gambar'] = null;
        }

        $item->update($data);

        return redirect()->route('portofolio.index')->with('success', 'Perubahan Data Berhasil!');
    }

    // DELETE
    public function destroy(string $id)
    {
        $item = Portofolio::findOrFail($id);
        $this->hapusGambar($item->gambar);
        $item->delete();

        return redirect()->route('portofolio.index')->with('success', 'Data berhasil dihapus');
    }
}
