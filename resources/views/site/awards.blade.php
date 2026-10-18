@extends('layouts.site')

@section('title','Awards & Achievements')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading"><h2>Awards & Achievements</h2></div>
        <div class="gallery-grid">
            @forelse(\App\Models\Award::orderBy('sort_order')->get() as $award)
                <div class="gallery-item" style="cursor: pointer;" data-lightbox="{{ asset('storage/'.$award->image) }}">
                    <img src="{{ asset('storage/'.$award->image) }}" alt="{{ $award->name }}" style="height: 300px; object-fit: cover;">
                    <div style="padding: 1rem; background: white; text-align: center;">
                        <h3 style="margin: 0.5rem 0; font-size: 1rem;">{{ $award->name }}</h3>
                        @if ($award->description)
                            <p style="margin: 0.5rem 0; font-size: 0.9rem; color: #666; max-height: 60px; overflow: hidden; text-overflow: ellipsis;">
                                {!! strip_tags($award->description) !!}
                            </p>
                        @endif
                    </div>
                </div>
            @empty
                <p style="text-align: center; color: #999; grid-column: 1 / -1;">No awards yet.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
