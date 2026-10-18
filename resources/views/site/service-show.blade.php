@extends('layouts.site')

@section('title', $service->title . ' - Proyash Agro Farm')

@section('content')
<section class="service-detail-hero">
    <div class="container service-detail-top">
        <div>
            <h1>{{ $service->title }}</h1>
            @if ($service->icon)
                <p>{{ $service->icon }}</p>
            @endif
        </div>
        <a href="{{ route('home') }}#services" class="service-back-link">Back to Home</a>
    </div>
</section>

<section class="service-detail-main reveal show">
    <div class="container service-detail-wrap">
        @if ($service->image_path)
            <div class="service-detail-image-box">
                <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="service-detail-image" loading="lazy">
            </div>
        @endif

        <article class="service-detail-content">
            {!! $service->description ?: 'This card detail is currently unavailable.' !!}
        </article>

        @if ($service->image_path || $relatedServices->whereNotNull('image_path')->isNotEmpty())
            <div>
                <h2 class="service-gallery-title">Photo Gallery</h2>
                <div class="service-thumb-grid">
                    @if ($service->image_path)
                        <button type="button" class="service-thumb" data-lightbox="{{ asset('storage/' . $service->image_path) }}" aria-label="Preview {{ $service->title }} image">
                            <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" loading="lazy">
                        </button>
                    @endif

                    @foreach ($relatedServices as $relatedService)
                        @if ($relatedService->image_path)
                            <button type="button" class="service-thumb" data-lightbox="{{ asset('storage/' . $relatedService->image_path) }}" aria-label="Preview {{ $relatedService->title }} image">
                                <img src="{{ asset('storage/' . $relatedService->image_path) }}" alt="{{ $relatedService->title }}" loading="lazy">
                            </button>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
