@extends('layouts.site')

@section('title',$concern->name)

@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading"><h2>{{ $concern->name }}</h2></div>
        <div class="split-grid">
            <div>
                {!! $concern->description !!}
                @if($concern->website)
                    <p>Website: <a href="{{ $concern->website }}" target="_blank">{{ $concern->website }}</a></p>
                @endif
            </div>
            <div>
                @if($concern->images)
                    <div class="gallery-grid">
                        @foreach($concern->images as $img)
                            <div class="gallery-item" style="overflow:hidden;border-radius:10px;">
                                <img src="{{ asset('storage/'.$img) }}" alt="" style="width:100%;transition:transform .25s ease;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
