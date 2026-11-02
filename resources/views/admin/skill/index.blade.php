@extends('admin.layout')
@section('title', 'Skill')
@section('heading', 'Data Skill')
@section('subheading', 'Tabel Skill_1027')
@section('actions')
    <a href="{{ route('skill.create') }}" class="btn btn-success text-white">+ Tambah Skill</a>
@endsection

@section('content')
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-centered table-nowrap mb-0 rounded">
                <thead class="thead-light">
                    <tr>
                        <th class="border-0">Nama</th>
                        <th class="border-0">Level</th>
                        <th class="border-0 rounded-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataSkill as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->level }}%</td>
                            <td>
                                <a href="{{ route('skill.edit', $item->skill_id) }}" class="btn btn-info btn-sm">Edit</a>
                                <form action="{{ route('skill.destroy', $item->skill_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center text-gray-500">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
