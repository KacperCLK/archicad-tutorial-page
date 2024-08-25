<form class="admin__form" id="updateForm" method="POST">
    @if (session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="admin__buttons-box">
        <div id="add_chapter" class="button button--admin-page">Add chapter</div>
        <div id="add_tutorial" class="button button--admin-page">Add tutorial</div>
        <button class="button button--admin-page" type="submit">Update All</button>
    </div>

    <div class="admin__form-content">
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
                        <div class="rectangle-list__buttons-box">
                            <button type="button" class="rectangle-list__btn edit">Edit</button>
                            <button type="button" wire:click="deleteChapter({{ $chapter['id'] }})" class="rectangle-list__btn delete">Delete</button>
                        </div>
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
                                    <div class="rounded-list__buttons-box">
                                        <button 
                                            type="button" 
                                            class="rounded-list__btn edit edit-tutorial-btn" 
                                            data-tutorial-id="{{ $tutorial['id'] }}"
                                            wire:click="editTutorial({{ $tutorial['id'] }})"
                                        >
                                            Edit
                                        </button>
                                        <button type="button" wire:click="deleteTutorial({{ $chapter['id'] }}, {{ $tutorial['id'] }})" class="rounded-list__btn delete">
                                            Delete
                                        </button>
                                    </div>
                                </span>
                        </li>
                    @endforeach
                </ol>
            </ol>
        @endforeach
    </div>
</form>

@script
<script>    
    // Przypisanie funkcji do przycisku do formularza
    document.querySelector('#updateForm').addEventListener('submit', function(event) {
        event.preventDefault();  
        submitDataToLivewire(); 
    });
        
    // Odczytywanie danych i przesyłanie ich do kontrolera livewire - updatowanie danych 
    const chapters = document.querySelectorAll('.admin__chapterBx');
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
