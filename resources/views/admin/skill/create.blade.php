@extends('admin.layout')
@section('title', 'Tambah Skill')
@section('heading', 'Tambah Skill')
@section('subheading', 'Isi data skill baru')

@section('content')
<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('skill.store') }}" method="POST">
            @csrf
            @include('admin.skill._form')
        </form>
    </div>
</div>
@endsection
