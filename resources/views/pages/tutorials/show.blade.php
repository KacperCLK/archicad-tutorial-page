@extends('layouts.main')

@section('title', 'Sample Tutorial')

@section('content')
<div class="tutorials-show">
    <h1 class="tutorials-show__video-title title--m">
        {{$chapterNumber}}.{{ $tutorial->number }}. {{ $tutorial->name }}

        <a href="{{ route('tutorials.index') }}" class="link link--inline"><i class="fa-solid fa-house"></i></a>
    </h1>
    
    <div class="tutorials-show__video-screen">
        <video id="myVideo" class="tutorials-show__video" controls>
            <source src="{{ asset('storage/videos/sample-video_1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="tutorials-show__description">
        {{ $tutorial->description }}
    </div>
    <div class="tutorials-show__video-hints">
        <div class="tutorials-show__hint">
            @foreach ($hints as $hint)
                <a href="{{ route('tutorials.show', ['tutorial' => $hint['id']]) }}" class="tutorials-show__hint__link">
                    <span>&#9654;</span>{{ $hint['name'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection