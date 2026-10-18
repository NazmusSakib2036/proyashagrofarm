@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
<div class="admin-page-header">
    <h1>Gallery</h1>
    <a class="btn-admin" href="{{ route('admin.galleries.create') }}">Add Image</a>
</div>
<table class="admin-table">
    <thead><tr><th>Image</th><th>Title</th><th>Order</th><th>Action</th></tr></thead>
    <tbody>
        @foreach ($galleries as $gallery)
            <tr>
                <td><img src="{{ asset('storage/' . $gallery->image_path) }}" class="admin-thumb" alt="Gallery" loading="lazy"></td>
                <td>{{ $gallery->title }}</td>
                <td>{{ $gallery->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.galleries.edit', $gallery) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}" class="inline-form">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
