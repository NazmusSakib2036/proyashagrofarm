@extends('layouts.admin')

@section('title', 'Cattle Cards')

@section('content')
<div class="admin-page-header">
    <h1>Cattle Cards</h1>
    <a class="btn-admin" href="{{ route('admin.services.create') }}">Add Card</a>
</div>
<table class="admin-table">
    <thead><tr><th>Title</th><th>Order</th><th>Status</th><th>Action</th></tr></thead>
    <tbody>
        @foreach ($services as $service)
            <tr>
                <td>{{ $service->title }}</td>
                <td>{{ $service->sort_order }}</td>
                <td>{{ $service->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('admin.services.edit', $service) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline-form">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
