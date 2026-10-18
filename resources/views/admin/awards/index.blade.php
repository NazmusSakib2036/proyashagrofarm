@extends('layouts.admin')

@section('title','Awards & Achievements')

@section('content')
<div class="admin-page-header">
    <h1>Awards & Achievements</h1>
    <a href="{{ route('admin.awards.create') }}" class="btn-primary">Add Award</a>
</div>

@if ($awards->isEmpty())
    <p style="text-align: center; color: #666;">No awards yet.</p>
@else
    <table class="admin-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Sort Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($awards as $award)
                <tr>
                    <td>{{ $award->name }}</td>
                    <td>
                        @if ($award->image)
                            <img src="{{ asset('storage/' . $award->image) }}" alt="{{ $award->name }}" style="max-width: 60px; max-height: 60px; border-radius: 4px;">
                        @else
                            <em style="color: #999;">No image</em>
                        @endif
                    </td>
                    <td>{{ $award->sort_order }}</td>
                    <td>
                        <a href="{{ route('admin.awards.edit', $award) }}" class="btn-small">Edit</a>
                        <form method="POST" action="{{ route('admin.awards.destroy', $award) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-small" onclick="return confirm('Delete this award?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
