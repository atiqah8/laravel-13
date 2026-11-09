@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row mb-4">
    <div class="col-lg-8">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul proyek</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $item->judul ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control" required>{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="teknologi" class="form-label">Teknologi (pisahkan dengan koma)</label>
            <input type="text" id="teknologi" name="teknologi" class="form-control" placeholder="Laravel, MySQL, Bootstrap" value="{{ old('teknologi', $item->teknologi ?? '') }}">
        </div>
    </div>

    <div class="col-lg-4">
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" id="tahun" name="tahun" class="form-control" min="1990" max="2100" value="{{ old('tahun', $item->tahun ?? date('Y')) }}" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link proyek (opsional)</label>
            <input type="url" id="link" name="link" class="form-control" placeholder="https://..." value="{{ old('link', $item->link ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (opsional, maks 2 MB)</label>
            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
            @if (!empty($item->gambar))
                <div class="mt-3">
                    <img src="{{ asset('uploads/portofolio/' . $item->gambar) }}" alt="gambar" class="img-fluid rounded mb-2" style="max-height:140px">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hapus_gambar" value="1" id="hapus_gambar">
                        <label class="form-check-label" for="hapus_gambar">Hapus gambar ini</label>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('portofolio.index') }}" class="btn btn-gray-200">Batal</a>
