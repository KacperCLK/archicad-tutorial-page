<?php

namespace App\Livewire\AdminPage;

use App\Models\Chapter;
use App\Models\Tutorial;
use Livewire\Component;

class ShowList extends Component
{
    public $chapters = [], $tutorials;
    protected $listeners = ['updateAll' => 'updateAll', 'refreshComponent' => 'refreshData'];

    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->chapters = Chapter::with('tutorials')->get()->map(function ($chapter) {
            return [
                'id' => $chapter->id,
                'number' => $chapter->number,
                'name' => $chapter->name,
                'tutorials' => $chapter->tutorials->sortBy('number')->map(function ($tutorial) {
                    return [
                        'id' => $tutorial->id,
                        'number' => $tutorial->number,
                        'name' => $tutorial->name,
                    ];
                })->toArray(),
            ];
        })->toArray();
    }

    // Kiedy użytkownik kliknie przycisk "Edit" na liście tutoriali, wywoływana jest metoda editTutorial, 
    // która używa dispatch() do wyemitowania zdarzenia editTutorial z nazwanym parametrem tutorialId.
    // Nasłuch następnie znajduje się w kontrolerze livewire EditTutorial
    public function editTutorial($tutorialId)
    {
        $this->dispatch('editTutorial', $tutorialId);
    }
    
    public function deleteChapter($chapterId)
    {
        $chapter = Chapter::find($chapterId);
        if ($chapter) {
            $chapter->delete();
            $this->chapters = array_filter($this->chapters, function($chapter) use ($chapterId) {
                return $chapter['id'] !== $chapterId;
            });
        }
    }

    public function deleteTutorial($chapterId, $tutorialId)
    {
        $chapter = Chapter::find($chapterId);
        if ($chapter) {
            $tutorial = $chapter->tutorials()->find($tutorialId);
            if ($tutorial) {
                $tutorial->delete();
                $this->chapters = array_map(function($chapter) use ($tutorialId) {
                    $chapter['tutorials'] = array_filter($chapter['tutorials'], function($tutorial) use ($tutorialId) {
                        return $tutorial['id'] !== $tutorialId;
                    });
                    return $chapter;
                }, $this->chapters);

                Tutorial::where('chapter_id', $chapterId)
                    ->where('number', '>=', $tutorial->number)
                    ->decrement('number');
            }
        }
    }

    public function updateAll($updatedData)
    {
        // Walidacja danych
        $this->validate([
            'chapters.*.number' => 'required|string|max:255',
            'chapters.*.name' => 'required|string|max:255',
            'chapters.*.tutorials.*.number' => 'required|integer',
            'chapters.*.tutorials.*.name' => 'required|string|max:255',
        ]);

        // Aktualizacja Chapter
        foreach ($updatedData as $chapterData) {
            $chapter = Chapter::find($chapterData['id']);
            if ($chapter) {
                foreach ($chapterData['tutorials'] as $tutorialData) {
                    $tutorial = Tutorial::find($tutorialData['id']);
                    if ($tutorial) {
                        $tutorial->number = $tutorialData['number'];
                        $tutorial->chapter_id = $chapterData['id'];
                        $tutorial->save();
                    }
                }
            }
        }

        ////////////// Przeładowanie strony, trzeba to naprawić później
        return redirect()->route('admin');
    }

    public function render()
    {
        return view('livewire.admin-page.show-list');
    }
}
