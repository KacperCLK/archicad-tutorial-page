@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="home">
        <div class="home__content">
            <div class="home__title-box">
                <p class="home__main-title">Witaj na stronie <span class="uppercase thickness-600">archicad tutorial</span>!</p>
                <p class="home__subtitle">Strona ta pozwoli Ci w wygodny sposób nauczyć się programu Archicad.</p>
            </div>
            <div class="home__hints">
                <p class="home__subtitle">Poniżej krótki przewodnik:</p>
                <div class="home__hint">
                    W zakładce <a href="{{route('tutorials.index')}}" class="link link--underline uppercase thickness-600"><p>tutorials</p></a> 
                    znajdziesz wszystkie stworzone przez nas kursy wraz z informacjami na ich temat. 
                    Jest to również miejsce od którego powineneś zacząć jeśli dopiero rozpoczynasz przygodę z Archicadem.
                </div>
                <div class="home__hint">
                    Wszystkie kursy znajdziesz również w panelu bocznym, po lewej stronie ekarnu.
                </div>
                <div class="home__hint">
                    W zakładce <a href="{{route('coord-changer')}}" class="link link--underline uppercase thickness-600"><p>coord changer</p></a> 
                    znajduje się aplikacja pozwalająca zmieniać wartości współrzędnych, w zalożności od używanego układu. 
                    Jest ona przydatna podczas ustawiania lokalizacji, o czym dowiesz się w rozdziale:
                    <a href="" class="link link--underline uppercase thickness-600"><p>chapter title</p></a>
                </div>
            </div>
            <div class="home__subtitle">
                W razie jakichkolwiek pytań, informacje na temat autorów szkolenia, oraz formularz kontaktowy znajdziesz w zakładce 
                <a href="{{route('contact')}}" class="link link--underline uppercase thickness-600"><p>contact</p></a> 
            </div>
        </div>
        <div class="home__logo">
            <img src="{{ asset('storage/photos/sample-logo.png') }}" alt="">
        </div>
    </div>

@endsection
