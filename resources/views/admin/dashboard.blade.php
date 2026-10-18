@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>
<div class="admin-stats-grid">
    <div class="admin-stat"><span>Services</span><strong>{{ $serviceCount }}</strong></div>
    <div class="admin-stat"><span>Gallery</span><strong>{{ $galleryCount }}</strong></div>
    <div class="admin-stat"><span>Team Members</span><strong>{{ $teamCount }}</strong></div>
    <div class="admin-stat"><span>Testimonials</span><strong>{{ $testimonialCount }}</strong></div>
    <div class="admin-stat"><span>Stats Counter</span><strong>{{ $statCount }}</strong></div>
    <div class="admin-stat"><span>Unread Messages</span><strong>{{ $unreadMessageCount }}</strong></div>
</div>
@endsection
