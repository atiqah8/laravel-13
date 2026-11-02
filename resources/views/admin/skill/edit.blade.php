@extends('admin.layout')
@section('title', 'Edit Skill')
@section('heading', 'Edit Skill')
@section('subheading', 'Ubah data skill')

@section('content')
<div class="card border-0 shadow components-section">
    <div class="card-body">
        <form action="{{ route('skill.update', $item->skill_id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.skill._form')
        </form>
    </div>
</div>
@endsection
