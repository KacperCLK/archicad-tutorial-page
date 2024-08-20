<?php

namespace App\Livewire;

use App\Models\Chapter;
use App\Models\Tutorial;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class DraggableListAdminPage extends Component
{
    public $chapters = [];
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

    public function updateAll($updatedData)
    {
        // Walidacja danych
        $this->validate([
            'chapters.*.number' => 'required|string|max:255',
            'chapters.*.name' => 'required|string|max:255',
            'chapters.*.tutorials.*.number' => 'required|integer',
            'chapters.*.tutorials.*.name' => 'required|string|max:255',
        ]);

        // dd($updatedData);
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
        return view('livewire.draggable-list-admin-page');
    }
}
