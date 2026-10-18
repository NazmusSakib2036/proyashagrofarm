@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
<h1>Contact Messages</h1>
<table class="admin-table">
    <thead><tr><th>Status</th><th>Name</th><th>Email</th><th>Received</th><th>Action</th></tr></thead>
    <tbody>
        @foreach ($messages as $message)
            <tr>
                <td>{{ $message->is_read ? 'Read' : 'Unread' }}</td>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->created_at->format('d M Y h:i A') }}</td>
                <td>
                    <a href="{{ route('admin.messages.show', $message) }}">View</a>
                    <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" style="display:inline; margin-left:8px;" onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-link-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $messages->links() }}
@endsection
