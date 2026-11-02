@extends('admin.layout')
@section('title', 'Pendidikan')
@section('heading', 'Data Pendidikan')
@section('subheading', 'Tabel Pendidikan_1027')
@section('actions')
    <a href="{{ route('pendidikan.create') }}" class="btn btn-success text-white">+ Tambah Pendidikan</a>
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">Institusi</th>
                        <th class="border-0">Jurusan</th>
                        <th class="border-0">Tahun</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPendidikan as $item)
                        <tr>
                            <td>{{ $item->institusi }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->tahun_masuk }} - {{ $item->tahun_lulus ?: 'sekarang' }}</td>
                            <td>
                                <a href="{{ route('pendidikan.edit', $item->pendidikan_id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('pendidikan.destroy', $item->pendidikan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-gray-500">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
