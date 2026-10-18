<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel') - Proyash Agro Farm</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="admin-body">
    <aside class="admin-sidebar">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}">Proyash Admin</a>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.hero.edit') }}">Hero Section</a>
            <a href="{{ route('admin.site-settings.edit') }}">Site Settings</a>
            <a href="{{ route('admin.services.index') }}">Cattle Cards</a>
            <a href="{{ route('admin.galleries.index') }}">Gallery</a>
            <a href="{{ route('admin.team-members.index') }}">Team Members</a>
            <a href="{{ route('admin.testimonials.index') }}">Testimonials</a>
            <a href="{{ route('admin.stats.index') }}">Stats Counter</a>
            <a href="{{ route('admin.media-partners.index') }}">Media Partners</a>
            <a href="{{ route('admin.our-talks.index') }}">আমাদের কথা</a>
            <a href="{{ route('admin.concerns.index') }}">Concern</a>
            <a href="{{ route('admin.awards.index') }}">Awards & Achievements</a>
            <a href="{{ route('admin.messages.index') }}">Contact Messages</a>
        </nav>
        <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </aside>

    <main class="admin-main">
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
