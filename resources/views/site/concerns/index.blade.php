@extends('layouts.site')

@section('title','Concerns')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading"><h2>Concerns</h2><p>Our concerns and partners</p></div>
        <div class="card-grid">
            @foreach($concerns as $c)
                <article class="service-card">
                    <h3><a href="{{ route('concerns.show',$c) }}">{{ $c->name }}</a></h3>
                    <p>{!! Str::limit(strip_tags($c->description),200) !!}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
