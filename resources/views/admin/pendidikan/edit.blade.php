@extends('admin.layout')
@section('title', 'Edit Pendidikan')
@section('heading', 'Edit Pendidikan')
@section('subheading', 'Ubah riwayat pendidikan')

@section('content')
<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('pendidikan.update', $item->pendidikan_id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.pendidikan._form')
        </form>
    </div>
</div>
@endsection
