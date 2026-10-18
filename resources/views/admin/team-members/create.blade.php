@extends('layouts.admin')

@section('title', 'Add Team Member')

@section('content')
<h1>Add Team Member</h1>
<form method="POST" action="{{ route('admin.team-members.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @include('admin.team-members.form')
    <button type="submit">Create</button>
</form>
@endsection
