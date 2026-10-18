@extends('layouts.site')

@section('title', 'About Us - Proyash Agro Farm')

@section('content')
<section class="inner-hero">
    <div class="container">
        <h1>About Proyash Agro Farm</h1>
        <p>{{ $setting->about_short_intro }}</p>
    </div>
</section>

<section class="section">
    <div class="container split-grid">
        <article>
            <h2>Company Details</h2>
            {!! $setting->about_full_details !!}
        </article>
        <article class="about-card">
            <h3>Vision</h3>
            {!! $setting->vision !!}
        </article>
    </div>
</section>

<section id="mission" class="section mission-section section-soft">
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

<section id="team" class="section section-soft">
    <div class="container">
        <h2>Team Members</h2>
        <div class="card-grid">
            @forelse ($teamMembers as $member)
                <article class="team-card">
                    @if ($member->image_path)
                        <img src="{{ asset('storage/' . $member->image_path) }}" alt="{{ $member->name }}" loading="lazy">
                    @endif
                    <h3>{{ $member->name }}</h3>
                    <p class="muted">{{ $member->designation }}</p>
                    <p>{{ $member->bio }}</p>
                </article>
            @empty
                <p>Team members will appear here once added from admin.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
