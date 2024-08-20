<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Tag;
use App\Models\Tutorial;
use Illuminate\Database\Seeder;

class TutorialSeeder extends Seeder
{
    public function run(): void
    {
        $chapters = Chapter::all();
        $tutorials = Tutorial::factory()->count(30)->make()->each(function ($tutorial) use ($chapters) {
            $tutorial->chapter_id = $chapters->random()->id;
            $tutorial->save();
        });

        $tags = Tag::factory()->count(10)->create();

        // Przypisywanie losowych tagów do tutoriali
        foreach ($tutorials as $tutorial) {
            $tutorial->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
        }

        // Tworzenie losowych podpowiedzi (hints)
        foreach ($tutorials as $tutorial) {
            $relatedTutorials = $tutorials->where('id', '!=', $tutorial->id)->random(rand(0, 3));
            foreach ($relatedTutorials as $related) {
                $tutorial->hints()->attach($related->id);
            }
        }

        // Przypisywanie numerów tutorialom w obrębie każdego rozdziału
        $this->assignNumbersToTutorials();
    }

    protected function assignNumbersToTutorials(): void
    {
        // Pobieranie wszystkich tutoriali pogrupowanych według rozdziału
        $chapters = Chapter::with('tutorials')->get();

        foreach ($chapters as $chapter) {
            $tutorials = $chapter->tutorials->sortBy('created_at'); // Możesz posortować według innego kryterium, jeśli chcesz

            $number = 1;
            foreach ($tutorials as $tutorial) {
                $tutorial->number = $number++;
                $tutorial->save();
            }
        }
    }
}
