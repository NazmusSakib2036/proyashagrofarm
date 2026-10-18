<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - Proyash Agro Farm</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body class="admin-login-body">
    <div class="admin-login-card">
        <img src="{{ asset('proyash agro logo.jpg') }}" alt="Proyash Agro Farm Logo" loading="lazy">
        <h1>Admin Panel Login</h1>
        <p>Use: admin@proyashagro.com / 12345678</p>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label class="checkbox"><input type="checkbox" name="remember"> Remember me</label>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
