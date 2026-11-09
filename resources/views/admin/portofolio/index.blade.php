@extends('admin.layout')
@section('title', 'Portofolio')
@section('heading', 'Data Portofolio')
@section('subheading', 'Tabel Portofolio_1027')
@section('actions')
    <a href="{{ route('portofolio.create') }}" class="btn btn-success text-white">+ Tambah Portofolio</a>
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">Gambar</th>
                        <th class="border-0">Judul</th>
                        <th class="border-0">Teknologi</th>
                        <th class="border-0">Tahun</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPortofolio as $item)
                        <tr>
                            <td>
                                @if ($item->gambar)
                                    <img src="{{ asset('uploads/portofolio/' . $item->gambar) }}" alt="" class="rounded" style="height:48px;width:72px;object-fit:cover">
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->teknologi }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>
                                <a href="{{ route('portofolio.edit', $item->portofolio_id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('portofolio.destroy', $item->portofolio_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-gray-500">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
