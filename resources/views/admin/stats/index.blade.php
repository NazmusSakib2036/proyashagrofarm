@extends('layouts.admin')

@section('title', 'Stats Counter')

@section('content')
<div class="admin-page-header">
    <h1>Stats Counter</h1>
    <a class="btn-admin" href="{{ route('admin.stats.create') }}">Add Stat</a>
</div>
<table class="admin-table">
    <thead><tr><th>Label</th><th>Value</th><th>Suffix</th><th>Action</th></tr></thead>
    <tbody>
        @foreach ($stats as $stat)
            <tr>
                <td>{{ $stat->label }}</td>
                <td>{{ $stat->value }}</td>
                <td>{{ $stat->suffix }}</td>
                <td>
                    <a href="{{ route('admin.stats.edit', $stat) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.stats.destroy', $stat) }}" class="inline-form">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
