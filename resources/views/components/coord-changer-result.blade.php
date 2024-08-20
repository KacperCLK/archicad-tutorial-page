<div class="accordion-coord-changer__contentBx" id="{{$id}}">
    <div class="accordion-coord-changer__label">
        <div class="accordion-coord-changer__label__content">
            {{ $content }}
        </div>
        <div class="accordion-coord-changer__label__location"></div>
    </div>
    <div class="accordion-coord-changer__content">
        <div class="accordion-coord-changer__content__lat">
            Szerokość:
            <div class="accordion-coord-changer__content__lat-result" data-copy-id="{{$id}}-lat-result"></div>
        </div>
        <div class="accordion-coord-changer__content__copy tooltip tooltip-click-and-fade" data-copy-target="{{$id}}-lat-result">
            <i class="fa-regular fa-copy"></i>
            <span class="tooltiptext">Skopiowano!</span>
        </div>
        
        <div class="accordion-coord-changer__content__lon">
            Długość:
            <div class="accordion-coord-changer__content__lon-result" data-copy-id="{{$id}}-lon-result"></div>
        </div>
        <div class="accordion-coord-changer__content__copy tooltip tooltip-click-and-fade" data-copy-target="{{$id}}-lon-result">
            <i class="fa-regular fa-copy"></i>
            <span class="tooltiptext">Skopiowano!</span>
        </div>

        <div class="accordion-coord-changer__content__change-unit tooltip tooltip-hover">
            <i class="fa-solid fa-arrow-right-arrow-left"></i>
            <span class="tooltiptext">Zmień jednostkę</span>
        </div>
    </div>
</div>