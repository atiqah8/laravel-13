@extends('admin.layout')
@section('title', 'Edit Portofolio')
@section('heading', 'Edit Portofolio')
@section('subheading', 'Ubah data proyek')

@section('content')
<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('portofolio.update', $item->portofolio_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.portofolio._form')
        </form>
    </div>
</div>
@endsection
