@extends('layouts.admin')

@section('title', 'Media Partners')

@section('content')
<div class="admin-page-header">
    <h1>মিডিয়াতে আমরা</h1>
    <a class="btn-admin" href="{{ route('admin.media-partners.create') }}">Add Media Logo</a>
</div>

<table class="admin-table">
    <thead>
        <tr>
            <th>Logo</th>
            <th>Title</th>
            <th>Link</th>
            <th>Order</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mediaPartners as $mediaPartner)
            <tr>
                <td>
                    @if ($mediaPartner->logo_path)
                        <img src="{{ asset('storage/' . $mediaPartner->logo_path) }}" alt="{{ $mediaPartner->title }}" class="admin-thumb" loading="lazy">
                    @endif
                </td>
                <td>{{ $mediaPartner->title }}</td>
                <td>{{ $mediaPartner->url }}</td>
                <td>{{ $mediaPartner->sort_order }}</td>
                <td>{{ $mediaPartner->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.media-partners.edit', $mediaPartner) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.media-partners.destroy', $mediaPartner) }}" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No media partner added yet.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
