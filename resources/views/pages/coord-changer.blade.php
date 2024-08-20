@extends('layouts.main')

@section('title', 'Coordinate Changer')

@section('content')
<div class="coord-changer">
    <div class="coord-changer__calculations">
        <div class="coord-changer__calculations__title title--m">Coordinate changer</div>

        <form class="coord-changer__calculations__customersCoords" id="coordForm">
            <p class="coord-changer__calculations__description">
                Proszę w poniższych polach podać współrzędne (w metrach). Układ nie ma znaczenia, wyświetlone zostaną wszystkie możliwości.
            </p>

            <div class="coord-changer__calculations__coord-field">
                <input type="text" id="xCoord" class="input input--1" name="xCoord" placeholder="Długość (X)" required>
                <input type="text" id="yCoord" class="input input--1" name="yCoord" placeholder="Szerokość (Y)" required>
            </div>

            <button class="button button--1" type="submit">Konwertuj</button>
        </form>

        <div class="accordion-coord-changer">
            <x-coord-changer-result id="Zone1" content="Układ 1992:" />
            <x-coord-changer-result id="Zone2" content="Układ 2000 - Strefa V:" />
            <x-coord-changer-result id="Zone3" content="Układ 2000 - Strefa VI:" />
            <x-coord-changer-result id="Zone4" content="Układ 2000 - Strefa VII:" />
            <x-coord-changer-result id="Zone5" content="Układ 2000 - Strefa VII:" />
            <x-coord-changer-result id="Zone6" content="Układ UTM - Strefa 33N:" />
            <x-coord-changer-result id="Zone7" content="Układ UTM - Strefa 34N:" />
            <x-coord-changer-result id="Zone8" content="Układ UTM - Strefa 35N:" />
        </div>
    </div>

    <div class="coord-changer__explanations">
        <p class="coord-changer__explanations__title title--m margin-bottom-m">
            O układach odniesienia:
        </p>

        <p class="coord-changer__explanations__title title--s margin-bottom-xxs">
            Układ 1992 (EPSG:2180)
        </p>
        <div class="coord-changer__explanations__description margin-bottom-s">
            <span>
                Układ stosowany obecnie dla danych w skali poniżej 1:10 000. Jest jednolity dla całej Polski (brak
                wydzieleń na pasy względem południków środkowych). Podstawowy układ współrzędnych stosowany w
                geoportal.gov.pl.
            </span>
            <span>
                Współrzędne geograficzne w tym układzie mają <span class="thickness-600">6 cyfr</span> w części liczb
                całkowitych (zarówno dla X, jak i Y).
            </span>
            <span>
                Przykładowe współrzędne, dla Krakowa:
                <span class="coord-changer__explanations__sample-coords thickness-600">
                    <span>X: 244246.34</span>
                    <span>Y: 567070.65</span>
                </span>
            </span>
        </div>

        <p class="coord-changer__explanations__title title--s margin-bottom-xxs">
            Układ 2000 (EPSG: 2176, 2177, 2178, 2179)
        </p>
        <div class="coord-changer__explanations__description margin-bottom-s">
            <span>
                Następca układu 1965 do zastosowań geodezyjnych w skalach powyżej 1:10 000. Spotkamy się z nim głównie
                na nowych mapach ewidencyjnych. Układ PL-2000 podzielony jest na cztery strefy, gdzie numer strefy (od V
                do VIII), zdefiniowany jest jako pierwsza cyfra (od 5 do 8) dla Y, a reszta to współrzędne.
            </span>
            <span>
                Współrzędne geograficzne w tym układzie mają <span class="thickness-600">6 cyfr</span> w części liczb
                całkowitych dla X oraz <span class="thickness-600">7 cyfr</span> w części liczb całkowitych dla Y.
            </span>
            <span>
                Przykładowe współrzędne, dla Krakowa:
                <span class="coord-changer__explanations__sample-coords thickness-600">
                    <span>X: 5547822.98</span>
                    <span>Y: 7423916,65</span>
                </span>
            </span>
        </div>

        <p class="coord-changer__explanations__title title--s margin-bottom-xxs">
            Układ UTM (EPSG: 32633, 32634, 32635)
        </p>
        <div class="coord-changer__explanations__description margin-bottom-s">
            <span>
                To uniwersalny dla obszaru całej kuli ziemskiej układ współrzędnych prostokątnych płaskich (o
                jednostkach metrycznych), oparty na elipsoidzie WGS 84. Układ podzielony jest na 60 południkowych stref
                odwzorowawczych (w formie pasów rozciągających się wzdłuż wybranych południków) (ryc. 2.), z których
                każda na unikalny kod EPSG. Terytorium Polski obejmują trzy strefy układu UTM: strefa 33N - EPSG: 32633,
                strefa 34N - EPSG: 32634, strefa 35N - EPSG: 32635.
            </span>
            <span>
                Współrzędne geograficzne w tym układzie mają <span class="thickness-600">7 cyfr</span> w części liczb
                całkowitych (zarówno dla X, jak i Y).
            </span>
            <span>
                Przykładowe współrzędne, dla Krakowa:
                <span class="coord-changer__explanations__sample-coords thickness-600">
                    <span>X (North): 5546030.54</span>
                    <span>Y (East): 423941.10</span>
                </span>
            </span>
        </div>
    </div>
</div>
@endsection