@extends('layouts.admin')

@section('title', 'Message Details')

@section('content')
<h1>Message Details</h1>
<div class="message-box">
    <p><strong>Name:</strong> {{ $message->name }}</p>
    <p><strong>Email:</strong> {{ $message->email }}</p>
    <p><strong>Phone:</strong> {{ $message->phone ?: 'N/A' }}</p>
    <p><strong>Date:</strong> {{ $message->created_at->format('d M Y h:i A') }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $message->message }}</p>
</div>
<a class="btn-admin" href="{{ route('admin.messages.index') }}">Back to Messages</a>
<form method="POST" action="{{ route('admin.messages.destroy', $message) }}" style="display:inline-block; margin-left:10px;" onsubmit="return confirm('Are you sure you want to delete this message?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn-link-danger">Delete Message</button>
</form>
@endsection
