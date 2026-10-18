@extends('layouts.site')

@section('title','Vision')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading"><h2>Vision</h2></div>
        <div class="about-card">
            {!! $setting->vision !!}
        </div>
    </div>
</section>
@endsection
