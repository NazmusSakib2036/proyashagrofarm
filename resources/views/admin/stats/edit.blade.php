@extends('layouts.admin')

@section('title', 'Edit Stat')

@section('content')
<h1>Edit Stat</h1>
<form method="POST" action="{{ route('admin.stats.update', $stat) }}" class="admin-form">
    @csrf
    @method('PUT')
    @include('admin.stats.form')
    <button type="submit">Update</button>
</form>
@endsection
