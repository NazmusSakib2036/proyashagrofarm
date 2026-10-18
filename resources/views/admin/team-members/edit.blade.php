@extends('layouts.admin')

@section('title', 'Edit Team Member')

@section('content')
<h1>Edit Team Member</h1>
<form method="POST" action="{{ route('admin.team-members.update', $member) }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')
    @include('admin.team-members.form')
    <button type="submit">Update</button>
</form>
@endsection
