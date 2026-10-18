@extends('layouts.admin')

@section('title', 'Add Stat')

@section('content')
<h1>Add Stat</h1>
<form method="POST" action="{{ route('admin.stats.store') }}" class="admin-form">
    @csrf
    @include('admin.stats.form')
    <button type="submit">Create</button>
</form>
@endsection
