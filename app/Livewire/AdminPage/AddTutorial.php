<?php

namespace App\Livewire\AdminPage;

use App\Models\Chapter;
use App\Models\Tutorial;
use Livewire\Component;

class AddTutorial extends Component
{
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

    public function submit()
    {
        $this->validate([
            'number' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'chapter_id' => 'required|integer|exists:chapters,id',
            'selectedHints.*' => 'integer|exists:tutorials,id',
        ]);

        if (!$this->number) {
            $maxNumber = Tutorial::where('chapter_id', $this->chapter_id)->max('number');
            $this->number = $maxNumber + 1;
        } else {
            Tutorial::where('chapter_id', $this->chapter_id)
                ->where('number', '>=', $this->number)
                ->increment('number');
        }

        $tutorial = Tutorial::create([
            'number' => $this->number,
            'name' => $this->name,
            'description' => $this->description,
            'chapter_id' => $this->chapter_id,
        ]);

        if ($this->selectedHints) {
            $tutorial->hints()->sync($this->selectedHints);
        }

        $this->reset(['number', 'name', 'description', 'chapter_id']);
                
        session()->flash('message', 'Tutorial został dodany pomyślnie.');
        
        return redirect()->route('admin');
    }
    
    public function render()
    {
        return view('livewire.admin-page.add-tutorial');
    }
}
