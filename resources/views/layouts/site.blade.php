<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Proyash Agro Farm')</title>
    <meta name="description" content="Proyash Agro Farm - Modern and sustainable agro business platform.">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body {
            cursor: url('{{ asset('assets/cowicon.png') }}') 4 4, auto;
        }

        a,
        button,
        input,
        textarea,
        select,
        label,
        summary,
        [role='button'] {
            cursor: url('{{ asset('assets/cowicon.png') }}') 4 4, pointer !important;
        }
    </style>
</head>
<body style="cursor: url('{{ asset('assets/cowicon.png') }}') 4 4, auto;">
    @php
        $whatsappNumber = preg_replace('/\D+/', '', $setting->contact_phone ?? '');
        if ($whatsappNumber !== '' && str_starts_with($whatsappNumber, '0')) {
            $whatsappNumber = '88' . $whatsappNumber;
        }
        $whatsappUrl = $whatsappNumber !== ''
            ? 'https://wa.me/' . $whatsappNumber . '?text=' . rawurlencode('Hello Proyash Agro Farm, I need assistance.')
            : 'https://wa.me/8801810470000';
        $facebookUrl = $setting->facebook_url ?: null;
        $instagramUrl = $setting->instagram_url ?: null;
        $youtubeUrl = $setting->youtube_url ?: null;
    @endphp

    <header id="site-header" class="site-header {{ !request()->routeIs('home') ? 'scrolled' : '' }}">
        <div class="container nav-wrap">
            <a href="{{ route('home') }}" class="brand" aria-label="Proyash Agro Farm home">
                <img src="{{ asset('proyash agro logo.jpg') }}" alt="Proyash Agro Farm Logo" class="brand-logo" loading="lazy">
                <span>Proyash Agro Farm</span>
            </a>
            <nav class="main-nav" id="main-nav">
                <a href="{{ route('home') }}#hero">Home</a>
                {{-- <a href="{{ route('home') }}#about">About</a> --}}
                <a href="{{ route('home') }}#services">Services</a>
                <a href="{{ route('home') }}#gallery">Gallery</a>
                <a href="{{ route('home') }}#contact">Contact</a>
                <div class="nav-dropdown">
                    <a href="#">About</a>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('about.proyash') }}">About Proyash</a>
                        <a href="{{ route('about.mission') }}">Mission</a>
                        <a href="{{ route('about.vision') }}">Vision</a>
                        <a href="{{ route('about.board') }}">Board of Directors</a>
                        <a href="{{ route('about.awards') }}">Awards & Achievements</a>
                    </div>
                </div>

                <div class="nav-dropdown">
                    <a href="{{ route('concerns.index') }}">Concern</a>
                    <div class="nav-dropdown-menu">
                        @foreach(\App\Models\Concern::orderBy('sort_order')->get() as $concern)
                            <a href="{{ route('concerns.show', $concern) }}">{{ $concern->name }}</a>
                        @endforeach
                    </div>
                </div>
            </nav>
            <button class="menu-toggle" id="menu-toggle" aria-label="Toggle navigation">☰</button>
        </div>
    </header>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')

    <footer class="site-footer">
        <div class="footer-top-band">
            <div class="container footer-top-grid">
                <div class="footer-pill">
                    <span class="footer-pill-title">ইমেইল</span>
                    <strong><a href="mailto:{{ $setting->contact_email }}" style="color: inherit; text-decoration: none;">{{ $setting->contact_email }}</a></strong>
                </div>
                <div class="footer-pill">
                    <span class="footer-pill-title">ফোন</span>
                    <strong><a href="tel:{{ $setting->contact_phone }}" style="color: inherit; text-decoration: none;">{{ $setting->contact_phone ?? '01810 47 0000' }}</a></strong>
                </div>
                <div class="footer-pill">
                    <span class="footer-pill-title">ঠিকানা</span>
                    <strong>{{ $setting->contact_address ?? 'Proyash Agro Farm, Bangladesh' }}</strong>
                </div>
                <div class="footer-social" aria-label="Social links" style="display:flex !important;flex-direction:row !important;flex-wrap:nowrap !important;align-items:center !important;justify-content:flex-start !important;gap:0.5rem !important;white-space:nowrap;min-width:max-content;">
                    <a href="{{ $facebookUrl ?: '#' }}" class="social-facebook {{ $facebookUrl ? '' : 'is-disabled' }}" aria-label="Facebook" style="width:34px;height:34px;min-width:34px;min-height:34px;max-width:34px;max-height:34px;display:grid;place-items:center;overflow:hidden;line-height:0;" @if($facebookUrl) target="_blank" rel="noopener" @endif>
                        <svg viewBox="0 0 24 24" aria-hidden="true" width="16" height="16" style="width:16px;height:16px;min-width:16px;min-height:16px;max-width:16px;max-height:16px;display:block;"><path d="M13.5 22v-8h2.6l.4-3h-3v-1.9c0-.9.3-1.5 1.6-1.5h1.6V5c-.3 0-1.3-.1-2.4-.1-2.4 0-4 1.4-4 4.1V11H8v3h2.4v8h3.1z" fill="#ffffff"/></svg>
                    </a>
                    <a href="{{ $instagramUrl ?: '#' }}" class="social-instagram {{ $instagramUrl ? '' : 'is-disabled' }}" aria-label="Instagram" style="width:34px;height:34px;min-width:34px;min-height:34px;max-width:34px;max-height:34px;display:grid;place-items:center;overflow:hidden;line-height:0;" @if($instagramUrl) target="_blank" rel="noopener" @endif>
                        <svg viewBox="0 0 24 24" aria-hidden="true" width="16" height="16" style="width:16px;height:16px;min-width:16px;min-height:16px;max-width:16px;max-height:16px;display:block;"><path d="M7.8 3h8.4A4.8 4.8 0 0 1 21 7.8v8.4a4.8 4.8 0 0 1-4.8 4.8H7.8A4.8 4.8 0 0 1 3 16.2V7.8A4.8 4.8 0 0 1 7.8 3zm8.2 1.8a1.1 1.1 0 1 0 0 2.2 1.1 1.1 0 0 0 0-2.2zM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 1.8A3.2 3.2 0 1 1 8.8 12 3.2 3.2 0 0 1 12 8.8z" fill="#ffffff"/></svg>
                    </a>
                    <a href="{{ $youtubeUrl ?: '#' }}" class="social-youtube {{ $youtubeUrl ? '' : 'is-disabled' }}" aria-label="YouTube" style="width:34px;height:34px;min-width:34px;min-height:34px;max-width:34px;max-height:34px;display:grid;place-items:center;overflow:hidden;line-height:0;" @if($youtubeUrl) target="_blank" rel="noopener" @endif>
                        <svg viewBox="0 0 24 24" aria-hidden="true" width="16" height="16" style="width:16px;height:16px;min-width:16px;min-height:16px;max-width:16px;max-height:16px;display:block;"><path d="M21.6 7.2a2.8 2.8 0 0 0-2-2c-1.8-.5-7.6-.5-7.6-.5s-5.8 0-7.6.5a2.8 2.8 0 0 0-2 2C2 9 2 12 2 12s0 3 .4 4.8a2.8 2.8 0 0 0 2 2c1.8.5 7.6.5 7.6.5s5.8 0 7.6-.5a2.8 2.8 0 0 0 2-2c.4-1.8.4-4.8.4-4.8s0-3-.4-4.8zM10 15.3V8.7L15.8 12 10 15.3z" fill="#ffffff"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="container footer-main">
            <div class="payment-strip" aria-label="Payment methods">

                <div class="accept-strip">
                    <span class="accept-label">We Accept</span>
                    <img src="{{ asset('SSLCOMMERZ.png') }}" alt="SSLCOMMERZ" loading="lazy">
                </div>
            </div>

            <div class="footer-bottom">
                <p>{{ $setting->footer_text ?? 'Growing tomorrow with sustainable agriculture.' }}</p>
                <p>© {{ now()->year }} Proyash Agro Farm All rights reserved.</p>
                <p class="footer-license">Trade License Registration: TRAD/DNCC/001842/2024</p>
            </div>
        </div>
    </footer>

    <a href="{{ $whatsappUrl }}" class="whatsapp-fab" target="_blank" rel="noopener" aria-label="Chat on WhatsApp" style="position:fixed;right:1rem;bottom:1rem;z-index:120;display:inline-flex;align-items:center;gap:0.42rem;background:linear-gradient(135deg,#1db954,#0b8f3b);color:#fff;font-weight:700;font-size:0.86rem;border-radius:999px;padding:0.7rem 1rem;box-shadow:0 10px 30px rgba(14,101,42,0.36);border:1px solid rgba(255,255,255,0.38);">
        <svg viewBox="0 0 32 32" aria-hidden="true" width="18" height="18" style="width:18px;height:18px;min-width:18px;min-height:18px;max-width:18px;max-height:18px;display:block;flex:0 0 18px;">
            <path fill="#ffffff" d="M27.2 4.8A15.5 15.5 0 0 0 2.9 23.5L1 31l7.7-1.8A15.5 15.5 0 1 0 27.2 4.8zm-11.7 25a12.5 12.5 0 0 1-6.4-1.8l-.5-.3-4.6 1.1 1.2-4.5-.3-.5A12.5 12.5 0 1 1 15.5 29.8zm6.9-9.4c-.4-.2-2.2-1.1-2.6-1.2-.3-.1-.5-.2-.7.2s-.8 1.2-1 1.4-.3.2-.6.1a10.3 10.3 0 0 1-3-1.8 11.6 11.6 0 0 1-2.1-2.6c-.2-.3 0-.5.1-.6l.5-.6.3-.5c.1-.2 0-.4 0-.6l-1.1-2.7c-.3-.7-.6-.6-.8-.6h-.7c-.2 0-.6.1-.9.4s-1.2 1.1-1.2 2.8 1.2 3.2 1.4 3.4c.2.2 2.4 3.7 5.8 5.1.8.3 1.4.5 1.9.7.8.2 1.5.2 2.1.1.6-.1 2.2-.9 2.5-1.8.3-.9.3-1.6.2-1.8 0-.2-.2-.3-.5-.4z"/>
        </svg>
        <span>WhatsApp</span>
    </a>

    <div class="lightbox" id="lightbox" aria-hidden="true">
        <button class="lightbox-close" id="lightbox-close" aria-label="Close">×</button>
        <img id="lightbox-image" src="" alt="Gallery preview">
    </div>
</body>
</html>
