@extends('layouts.main')

@section('title', 'Tutorials')

@section('content')
<div class="tutorials-index">
    <div class="tutorials-index__tutorial-list">
        <p class="tutorials-index__title title--m">List of courses:</p>
        <div class="tutorials-index__tutorial-list__box">
            @foreach ($chapters as $chapter)
                <div class="title--s thickness-600">
                    {{ $chapter->number }}. {{ $chapter->name }}:
                </div>
                <div class="tutorials-index__tutorial-list__tutorials">
                    @foreach ($chapter->tutorials as $tutorial)
                        <div class="tutorials-index__tutorial-list__tutorial margin-bottom-xs">
                            <a  href="{{ route('tutorials.show', ['tutorial' => $tutorial->id]) }}" class=" link link--inline thickness-500">
                                {{ $chapter->number }}.{{ $tutorial->number }}. {{ $tutorial->name }}
                            </a>
                            <div class="tutorials-index__tutorial-list__tutorial-details">
                                <p>{{ $tutorial->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <div class="tutorials-index__information-for-new">
        <p class="tutorials-index__title title--m">How to start?</p>
        <p class="tutorials-index__description">
            <span>
                If you are just starting with Archicad, begin your learning with the video below and follow the
                suggested sequence. The course has been designed so that anyone can easily learn everything needed for
                daily use of the program.
            </span>
            <span>
                If you have any doubts, the
                <a class="link link--inline thickness-600 italic" href="{{ route('contact') }}"> Contact </a>
                tab contains information on how to get in touch with the course creators.
            </span>
        </p>

        <video id="myVideo" class="tutorials-show__video" controls>
            <source src="{{ asset('storage/videos/sample-video_1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <div>
            Instructions can also be downloaded from the following link: <a class="link link--inline thickness-600"
                href="">LINK_TO_INSTUCTION</a>
        </div>
    </div>
</div>
@endsection