@extends('admin.layout')
@section('title', 'Profil')
@section('heading', 'Profil')
@section('subheading', 'Data diri dan foto yang tampil di bagian atas CV (tabel Profil_1027)')

@section('content')
<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                        <label for="nama" class="form-label">Nama lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $item->nama ?? 'Atiqah Nur Aqillah') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="peran" class="form-label">Peran / status</label>
                        <input type="text" id="peran" name="peran" class="form-control" value="{{ old('peran', $item->peran ?? 'Mahasiswa Teknik Informatika') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tentang" class="form-label">Tentang saya</label>
                        <textarea id="tentang" name="tentang" rows="4" class="form-control">{{ old('tentang', $item->tentang ?? 'Mahasiswa yang suka membangun aplikasi web dengan Laravel dan MySQL.') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $item->email ?? 'atiqah25ti@mahasiswa.pcr.ac.id') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ old('lokasi', $item->lokasi ?? 'Indonesia') }}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto profil (opsional, maks 2 MB)</label>
                        <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
                        @if (!empty($item->foto))
                            <div class="mt-3">
                                <img src="{{ asset('uploads/profil/' . $item->foto) }}" alt="foto" class="rounded-circle mb-2" style="width:120px;height:120px;object-fit:cover">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="hapus_foto" value="1" id="hapus_foto">
                                    <label class="form-check-label" for="hapus_foto">Hapus foto ini</label>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('cv') }}" class="btn btn-gray-200">Lihat CV</a>
        </form>
    </div>
</div>
@endsection
