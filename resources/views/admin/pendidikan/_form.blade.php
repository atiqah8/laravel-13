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
            <label for="institusi" class="form-label">Institusi / Sekolah</label>
            <input type="text" id="institusi" name="institusi" class="form-control" placeholder="Politeknik Caltex Riau" value="{{ old('institusi', $item->institusi ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan / Program studi</label>
            <input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="Teknik Informatika" value="{{ old('jurusan', $item->jurusan ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan (opsional)</label>
            <textarea id="keterangan" name="keterangan" rows="3" class="form-control">{{ old('keterangan', $item->keterangan ?? '') }}</textarea>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="tahun_masuk" class="form-label">Tahun masuk</label>
            <input type="number" id="tahun_masuk" name="tahun_masuk" class="form-control" min="1990" max="2100" value="{{ old('tahun_masuk', $item->tahun_masuk ?? date('Y')) }}" required>
        </div>
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun lulus (kosongkan jika masih berjalan)</label>
            <input type="number" id="tahun_lulus" name="tahun_lulus" class="form-control" min="1990" max="2100" value="{{ old('tahun_lulus', $item->tahun_lulus ?? '') }}">
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('pendidikan.index') }}" class="btn btn-gray-200">Batal</a>
