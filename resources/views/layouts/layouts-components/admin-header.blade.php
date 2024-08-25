<nav class="admin-header">
    <!-- Left Side Of Navbar -->
    <div class="admin-header__left-side">
        <img src="{{ asset('storage/photos/sample-logo.png') }}" alt="page logo" class="admin-header__logo">
        <a class="link link--underline" href="{{ route('home') }}">
            <p class="uppercase thickness-300">archicad<span class="thickness-700">Tutoraial</span></p>
        </a>
    </div>

    <!-- Right Side Of Navbar -->
    <div class="admin-header__right-side">
        {{-- Not authenticated users --}}
        @guest
            @if (Route::has('login'))
                <a class="link link--underline" href="{{ route('login') }}">
                    <p>{{ __('Login') }}</p>
                </a>
            @endif

            @if (Route::has('register'))
                <a class="link link--underline" href="{{ route('register') }}">
                    <p>{{ __('Register') }}</p>
                </a>
            @endif
        
        {{-- Authenticated users --}}
        @else
            <a id="navbarDropdown" class="link link--underline" href="#" role="button">
                <p>{{ Auth::user()->name }}</p>
            </a>

            <div class="" aria-labelledby="navbarDropdown">
                <a class="link link--underline" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <p>{{ __('Logout') }}</p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                </form>
            </div>
        @endguest
    </div>
</nav>