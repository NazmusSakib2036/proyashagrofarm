@extends('layouts.site')

@section('title', 'Proyash Agro Farm - Sustainable Agro Business')

@section('content')
<section id="hero" class="hero-section">
    @if ($setting->hero_video_path)
        <video class="hero-video" autoplay muted loop playsinline preload="metadata">
            <source src="{{ asset('storage/' . $setting->hero_video_path) }}" type="video/mp4">
        </video>
    @endif
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <p class="hero-kicker">Proyash Agro Farm</p>
        <h1>{{ $setting->hero_headline ?: 'কৃষিই আমাদের প্রেরণা' }}</h1>
        <p>{{ $setting->hero_subtext ?: 'আধুনিক প্রযুক্তিতে টেকসই কৃষি' }}</p>
        <a href="{{ $setting->hero_cta_url ?: '#about' }}" class="btn-primary">{{ $setting->hero_cta_text ?: 'আমাদের সম্পর্কে জানুন' }}</a>
    </div>
</section>

<section id="services" class="section cattle-section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>What Makes Our <span>Cattle</span> Great?</h2>
            <p>মানসম্মত গরু উৎপাদনে আমরা যেভাবে আলাদা</p>
        </div>

        <div class="cattle-grid">
            @forelse ($services as $service)
                <a href="{{ route('services.show', $service) }}" class="cattle-card" aria-label="{{ $service->title }} details">
                    @if ($service->image_path)
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" loading="lazy">
                    @endif
                    <div class="cattle-card-body">
                        <h3>{{ $service->title }}</h3>
                        @if ($service->icon)
                            <p class="cattle-card-subtitle">{{ $service->icon }}</p>
                        @endif
                        <span class="cattle-card-cta">Read details</span>
                    </div>
                </a>
            @empty
                <p class="cattle-empty">No service cards added yet.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="about" class="section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>About <span>Us</span></h2>
            <p>আমাদের যাত্রা এবং লক্ষ্য</p>
        </div>
        <div>
            <p>{{ $setting->about_short_intro }}
            <a href="{{ route('about') }}" class="link-arrow">Read More</a></p>
        </div>
    </div>
</section>

<section id="mission" class="section mission-section section-soft reveal">
    <div class="container">
        <div class="section-heading">
            <h2>Our <span>Mission</span></h2>
            <p>আমাদের লক্ষ্য এবং কাজের দিকনির্দেশনা</p>
        </div>
        <div class="about-card mission-card">
            {!! $setting->mission !!}
        </div>
    </div>
</section>

<section id="why" class="section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>Why <span>Choose Us</span></h2>
            <p>আমরা কেন বিশেষ</p>
        </div>
        {{-- <p class="lead">{{ $setting->why_choose_us_text }}</p> --}}
        <p class="lead">{!! $setting->why_choose_us_text !!}</p>
    </div>
</section>

<section id="stats" class="section section-soft reveal">
    <div class="container">
        <div class="section-heading">
            <h2>আমাদের <span>সাফল্য</span></h2>
            <p>সংখ্যায় আমাদের অর্জন</p>
        </div>
        <div class="stats-grid">
        @forelse ($stats as $stat)
            <div class="stat-card" >
                {{-- <h3 class="counter" data-target="{{ $stat->value }}">0</h3> --}}
                <h3>
                  <span class="counter" data-target="{{ $stat->value }}">0</span>{{ $stat->suffix }}
               </h3>
                <p> {{ $stat->label }}</p>
            </div>
        @empty
            <p>No stats available yet.</p>
        @endforelse
        </div>
    </div>
</section>

<section id="gallery" class="section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>Our <span>Gallery</span></h2>
            <p>আমাদের খামার এবং কার্যক্রম</p>
        </div>
        <div class="gallery-grid">
            @foreach ($galleries as $item)
                <button type="button" class="gallery-item" data-lightbox="{{ asset('storage/' . $item->image_path) }}">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title ?: 'Gallery image' }}" loading="lazy">
                </button>
            @endforeach
        </div>
    </div>
</section>

<section id="testimonials" class="section section-soft reveal">
    <div class="container">
        <div class="section-heading">
            <h2>Customer <span>Testimonials</span></h2>
            <p>আমাদের গ্রাহকরা কি বলেন</p>
        </div>
        <div class="testimonial-slider" data-slider>
            @foreach ($testimonials as $testimonial)
                <article class="testimonial-item">
                    <p>“{{ $testimonial->content }}”</p>
                    <h4>{{ $testimonial->name }}</h4>
                    <span>{{ $testimonial->designation }}</span>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="media" class="section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>মিডিয়াতে <span>আমরা </span></h2>
            <p>যেখানে আমরা ফিচার হয়েছি</p>
        </div>
        <div class="media-grid">
            @forelse ($mediaPartners as $media)
                <a href="{{ $media->url ?: '#' }}" class="media-logo-card" target="_blank" rel="noopener" aria-label="{{ $media->title }}">
                    @if ($media->logo_path)
                        <img src="{{ asset('storage/' . $media->logo_path) }}" alt="{{ $media->title }}" loading="lazy">
                    @else
                        <span>{{ $media->title }}</span>
                    @endif
                </a>
            @empty
                <p>No media partner added yet.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="our-talks" class="section talk-section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>আমাদের <span>কথা</span></h2>
            <p>আপডেট, অন্তর্দৃষ্টি এবং আমাদের কৃষি যাত্রা</p>
        </div>
        <div class="talk-grid">
            @forelse ($ourTalks as $talk)
                <a href="{{ route('our-talks.show', $talk) }}" class="talk-card-link" aria-label="{{ $talk->title }} details">
                    @if ($talk->image_path)
                        <img src="{{ asset('storage/' . $talk->image_path) }}" alt="{{ $talk->title }}" loading="lazy">
                    @endif
                    <div class="talk-card-body">
                        <h3>{{ $talk->title }}</h3>
                        <p class="talk-card-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags((string) $talk->description), 60) }}</p>
                        <span class="talk-card-cta">পড়ুন আরও</span>
                    </div>
                </a>
            @empty
                <p class="talk-empty">আমাদের কথা সেকশনে এখনো কিছু যোগ করা হয়নি।</p>
            @endforelse
        </div>
    </div>
</section>

<section id="contact" class="section contact-section reveal">
    <div class="container">
        <div class="section-heading">
            <h2>Contact <span>Us</span></h2>
            <p>আপনার বার্তা পাঠান, আমরা সাথে আছি</p>
        </div>

        <div class="split-grid">
            <form method="POST" action="{{ route('contact.submit') }}" class="contact-form">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                <textarea name="message" placeholder="Message" rows="4" required>{{ old('message') }}</textarea>
                <button type="submit" class="btn-primary">Send Message</button>
            </form>
            <div>
                @if ($setting->map_embed_url)
                    <iframe src="{{ $setting->map_embed_url }}" width="100%" height="360" style="border:0; border-radius: 14px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
