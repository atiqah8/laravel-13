@extends('admin.layout')
@section('title', 'Tambah Portofolio')
@section('heading', 'Tambah Portofolio')
@section('subheading', 'Isi data proyek baru')

@section('content')
<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.portofolio._form')
        </form>
    </div>
</div>
@endsection
