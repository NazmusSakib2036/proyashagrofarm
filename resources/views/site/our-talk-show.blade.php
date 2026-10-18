@extends('layouts.site')

@section('title', $ourTalk->title . ' - Proyash Agro Farm')

@section('content')
<section class="talk-detail-hero">
    <div class="container talk-detail-top">
        <div>
            <h1>{{ $ourTalk->title }}</h1>
        </div>
        <a href="{{ route('home') }}#our-talks" class="talk-back-link">আমাদের কথায় ফিরুন</a>
    </div>
</section>

<section class="talk-detail-main reveal show">
    <div class="container talk-detail-wrap">
        @if ($ourTalk->image_path)
            <div class="talk-detail-image-box">
                <img src="{{ asset('storage/' . $ourTalk->image_path) }}" alt="{{ $ourTalk->title }}" class="talk-detail-image" loading="lazy">
            </div>
        @endif

        <article class="talk-detail-content">
            {!! $ourTalk->description ?: 'বিস্তারিত এখনো উপলব্ধ নেই।' !!}
        </article>

        @if ($ourTalk->external_url)
            <div class="talk-detail-link-box">
                <a href="{{ $ourTalk->external_url }}" target="_blank" rel="noopener" class="btn-primary">মূল উৎসে পড়ুন</a>
            </div>
        @endif

        @if ($ourTalk->image_path || $relatedTalks->whereNotNull('image_path')->isNotEmpty())
            <div>
                <h2 class="talk-gallery-title">আরও আপডেট</h2>
                <div class="talk-thumb-grid">
                    @if ($ourTalk->image_path)
                        <button type="button" class="talk-thumb" data-lightbox="{{ asset('storage/' . $ourTalk->image_path) }}" aria-label="Preview {{ $ourTalk->title }} image">
                            <img src="{{ asset('storage/' . $ourTalk->image_path) }}" alt="{{ $ourTalk->title }}" loading="lazy">
                        </button>
                    @endif

                    @foreach ($relatedTalks as $relatedTalk)
                        @if ($relatedTalk->image_path)
                            <button type="button" class="talk-thumb" data-lightbox="{{ asset('storage/' . $relatedTalk->image_path) }}" aria-label="Preview {{ $relatedTalk->title }} image">
                                <img src="{{ asset('storage/' . $relatedTalk->image_path) }}" alt="{{ $relatedTalk->title }}" loading="lazy">
                            </button>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
