<div class="admin">
    @if (session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form class="admin__form" id="updateForm" method="POST">
        <button class="admin__submit-button" type="submit">Update All</button>

        @foreach ($chapters as $index => $chapter)
            <ol 
                class="admin__chapterBx rectangle-list" 
                data-chapter-id="{{ $chapter['id'] }}"
                data-chapter-number="{{ $chapter['number'] }}"
                >
                <li class="admin__chapter rectangle-list__box">
                    <span class="rectangle-list__number">
                        <span class="admin__chapterBx__number">{{$chapter['number']}}</span>
                        .
                    </span>
                    <span class="rectangle-list__title">
                        {{$chapter['name']}}
                        <button type="button" class="rectangle-list__btn">Edit</button>
                    </span>
                </li>

                <ol class="rounded-list">
                    @foreach ($chapter['tutorials'] as $tutorialIndex => $tutorial)
                        <li 
                            class="admin__tutorialBx draggable rounded-list__box" 
                            draggable="true" 
                            data-tutorial-id="{{ $tutorial['id'] }}"
                            >
                                <span class="rounded-list__number">
                                    <span class="admin__tutorialBx__number">{{$tutorial['number']}}</span>
                                    .
                                </span>
                                <span class="rounded-list__title">
                                    {{$tutorial['name']}}
                                    <button type="button" class="rounded-list__btn">Edit</button>
                                </span>
                        </li>
                    @endforeach
                </ol>
            </ol>
        @endforeach
    </form>
</div>

@script
<script>
    const chapters = document.querySelectorAll('.admin__chapterBx');

    // Przypisanie funkcji do przycisku lub formularza
    document.querySelector('#updateForm').addEventListener('submit', function(event) {
        event.preventDefault();  
        submitDataToLivewire(); 
    });

    // Odczytywanie danych i przesyłanie ich do kontrolera livewire
    function submitDataToLivewire() {
        const updatedData = [];

        chapters.forEach((chapter, chapterIndex) => {
            const chapterId = chapter.dataset.chapterId;
            const chapterNumber = chapter.querySelector('.admin__chapterBx__number').textContent
            const tutorials = [...chapter.querySelectorAll('.admin__tutorialBx')];

            const updatedChapter = {
                id: chapterId,
                number: chapterNumber,
                tutorials: tutorials.map((tutorial, tutorialIndex) => {
                    return {
                        id: tutorial.dataset.tutorialId, 
                        number: tutorial.querySelector('.admin__tutorialBx__number').textContent,
                    };
                })
            };

            updatedData.push(updatedChapter);
        });

        Livewire.dispatch('updateAll', { updatedData });
    }
</script>
@endscript
