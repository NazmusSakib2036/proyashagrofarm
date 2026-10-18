@extends('layouts.site')

@section('title','Mission')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading"><h2>Mission</h2></div>
        <div class="about-card">
            {!! $setting->mission !!}
        </div>
    </div>
</section>
@endsection
