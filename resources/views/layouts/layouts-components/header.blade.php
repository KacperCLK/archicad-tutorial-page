<header class="header">
    <div class="header__inner-header">
        <div class="header__logo-container">
            <img src="{{ asset('storage/photos/sample-logo.png') }}" alt="">
            <h1 class="header__logo uppercase thickness-300">archicad<span class="thickness-700">Tutoraial</span></h1>
        </div>
        <ul class="header__navigation">
            @foreach ($links as $link)
                <a href="{{ $link['url'] }}" class="link link--underline {{ $link['active'] ? 'link--active' : '' }}">
                    <p>{{ $link['name'] }}</p>
                </a>
            @endforeach
        </ul>
    </div>
</header>