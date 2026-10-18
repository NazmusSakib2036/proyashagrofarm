@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="admin-page-header">
    <h1>Testimonials</h1>
    <a class="btn-admin" href="{{ route('admin.testimonials.create') }}">Add Testimonial</a>
</div>
<table class="admin-table">
    <thead><tr><th>Name</th><th>Rating</th><th>Status</th><th>Action</th></tr></thead>
    <tbody>
        @foreach ($testimonials as $testimonial)
            <tr>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->rating }}/5</td>
                <td>{{ $testimonial->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" class="inline-form">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
