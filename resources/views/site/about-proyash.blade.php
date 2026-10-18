@extends('layouts.site')

@section('title','About Proyash')

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading"><h2>About Proyash Agro Farm</h2></div>
        <div class="about-card">
            {!! $setting->about_full_details !!}
        </div>
    </div>
</section>
@endsection
