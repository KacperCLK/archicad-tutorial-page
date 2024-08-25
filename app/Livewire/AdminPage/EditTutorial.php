<?php

namespace App\Livewire\AdminPage;

use App\Models\Chapter;
use App\Models\Tutorial;
use Livewire\Component;

class EditTutorial extends Component
{    
    public $tutorial;
    protected $listeners = ['editTutorial'];

    public $number, $name, $description, $chapter_id, $chapters = [], $selectedHints = [], $allTutorials = [];

    public function mount()
    {
        $this->chapters = Chapter::all();
        $this->allTutorials = Tutorial::join('chapters', 'tutorials.chapter_id', '=', 'chapters.id')
            ->select('tutorials.*', 'chapters.number as chapter_number')
            ->orderBy('chapters.number')
            ->orderBy('tutorials.number')
            ->get();
    }

    // Funkcja nasłuchująca, wywołanie znajduje się w kontrolerze livewire: ShowList
    public function editTutorial($tutorialId)
    {
        $this->tutorial = Tutorial::find($tutorialId);

        $this->number = $this->tutorial->number;
        $this->name = $this->tutorial->name;
        $this->description = $this->tutorial->description;
        $this->selectedHints = $this->tutorial->hints->pluck('id')->toArray();
        $this->chapter_id = $this->tutorial->chapter_id;
    }

    public function updateTutorial()
    {
        $this->validate([
            'number' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'chapter_id' => 'required|integer|exists:chapters,id',
            'selectedHints.*' => 'integer|exists:tutorials,id',
        ]);

        // if (!$this->number) {
        //     $maxNumber = Tutorial::where('chapter_id', $this->chapter_id)->max('number');
        //     $this->number = $maxNumber + 1;
        // } else {
        //     Tutorial::where('chapter_id', $this->chapter_id)
        //         ->where('number', '>=', $this->number)
        //         ->where('id', '!=', $this->tutorial->id) // Wykluczamy aktualnie edytowany tutorial
        //         ->increment('number');
        // }

        $this->tutorial->update([
            'number' => $this->number,
            'name' => $this->name,
            'description' => $this->description,
            'chapter_id' => $this->chapter_id,
        ]);

        if ($this->selectedHints) {
            $this->tutorial->hints()->sync($this->selectedHints);
        }

        $this->reset(['number', 'name', 'description', 'chapter_id', 'selectedHints']);
                    
        session()->flash('message', 'Tutorial został zaktualizowany pomyślnie.');
    }

    public function render()
    {
        return view('livewire.admin-page.edit-tutorial');
    }
}
