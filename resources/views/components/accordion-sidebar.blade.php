<div class="accordion-sidebar">
    @foreach ($chapters as $chapter)
        <div class="accordion-sidebar__contentBx">
            <div class="accordion-sidebar__label">
                <p>{{$chapter['number']}}. {{$chapter['name']}}</p>
            </div>
            <div class="accordion-sidebar__content">
                @foreach ($chapter['tutorials'] as $tutorial)
                    <a href="{{ route('tutorials.show', ['tutorial' => $tutorial['id']]) }}" class="link">
                        <p class="margin-bottom-xxs">{{$chapter['number']}}.{{$tutorial['number']}}. {{$tutorial['name']}}</p>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>