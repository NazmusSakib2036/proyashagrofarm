@extends('layouts.admin')

@section('title', 'Edit Talk Post')

@section('content')
<h1>আমাদের কথা পোস্ট এডিট</h1>
<form method="POST" action="{{ route('admin.our-talks.update', $ourTalk) }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @method('PUT')
    @include('admin.our-talks.form')
    <button type="submit">Update</button>
</form>
@endsection
