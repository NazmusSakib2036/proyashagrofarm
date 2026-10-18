@extends('layouts.admin')

@section('title', 'আমাদের কথা')

@section('content')
<div class="admin-page-header">
    <h1>আমাদের কথা</h1>
    <a class="btn-admin" href="{{ route('admin.our-talks.create') }}">Add Post</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Link</th>
            <th>Order</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ourTalks as $ourTalk)
            <tr>
                <td>
                    @if ($ourTalk->image_path)
                        <img src="{{ asset('storage/' . $ourTalk->image_path) }}" alt="{{ $ourTalk->title }}" class="admin-thumb" loading="lazy">
                    @endif
                </td>
                <td>{{ $ourTalk->title }}</td>
                <td>{{ $ourTalk->external_url }}</td>
                <td>{{ $ourTalk->sort_order }}</td>
                <td>{{ $ourTalk->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.our-talks.edit', $ourTalk) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.our-talks.destroy', $ourTalk) }}" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No post added yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
