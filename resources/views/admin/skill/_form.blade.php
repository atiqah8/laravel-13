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
    <div class="col-lg-6">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama skill</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $item->nama ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level (0-100)</label>
            <input type="number" id="level" name="level" class="form-control" min="0" max="100" value="{{ old('level', $item->level ?? 50) }}" required>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('skill.index') }}" class="btn btn-gray-200">Batal</a>
