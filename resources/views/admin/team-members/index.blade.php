@extends('layouts.admin')

@section('title', 'Team Members')

@section('content')
<div class="admin-page-header">
    <h1>Team Members</h1>
    <a class="btn-admin" href="{{ route('admin.team-members.create') }}">Add Team Member</a>
</div>
<table class="admin-table">
    <thead><tr><th>Name</th><th>Designation</th><th>Order</th><th>Action</th></tr></thead>
    <tbody>
        @foreach ($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->designation }}</td>
                <td>{{ $member->sort_order }}</td>
                <td>
                    <a href="{{ route('admin.team-members.edit', $member) }}">Edit</a>
                    <form method="POST" action="{{ route('admin.team-members.destroy', $member) }}" class="inline-form">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
