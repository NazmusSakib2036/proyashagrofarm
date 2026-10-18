@extends('layouts.admin')

@section('title', 'Create Talk Post')

@section('content')
<h1>আমাদের কথা পোস্ট তৈরি</h1>
<form method="POST" action="{{ route('admin.our-talks.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @include('admin.our-talks.form')
    <button type="submit">Create</button>
</form>
@endsection
