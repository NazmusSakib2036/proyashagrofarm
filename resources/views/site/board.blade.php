@extends('layouts.site')

@section('title','Board of Directors')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading"><h2>Board of Directors</h2></div>
        <div class="card-grid">
            @foreach($directors as $d)
                <article class="team-card">
                    @if($d->image_path)
                        <img src="{{ asset('storage/'.$d->image_path) }}" alt="{{ $d->name }}">
                    @endif
                    <h3>{{ $d->name }}</h3>
                    <p class="muted">{{ $d->designation }}</p>
                    <p>{{ $d->bio }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
