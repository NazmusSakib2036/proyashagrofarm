@extends('layouts.admin')

@section('title', 'Create Service')

@section('content')
<h1>Create Service</h1>
<form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @include('admin.services.form')
    <button type="submit">Create</button>
</form>
@endsection
