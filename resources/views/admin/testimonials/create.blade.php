@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')
<h1>Add Testimonial</h1>
<form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data" class="admin-form">
    @csrf
    @include('admin.testimonials.form')
    <button type="submit">Create</button>
</form>
@endsection
