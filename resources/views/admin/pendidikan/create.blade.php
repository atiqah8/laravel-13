@extends('admin.layout')
@section('title', 'Tambah Pendidikan')
@section('heading', 'Tambah Pendidikan')
@section('subheading', 'Isi riwayat pendidikan')

@section('content')
<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('pendidikan.store') }}" method="POST">
            @csrf
            @include('admin.pendidikan._form')
        </form>
    </div>
</div>
@endsection
