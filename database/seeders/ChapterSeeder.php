<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    public function run($tutorials = []): void
    {
        Chapter::create(['number' => '1', 'name' => 'Chapter 1']);
        Chapter::create(['number' => '1.1', 'name' => 'Chapter 1.1']);
        Chapter::create(['number' => '1.2', 'name' => 'Chapter 1.2']);
        Chapter::create(['number' => '2', 'name' => 'Chapter 2']);
        Chapter::create(['number' => '3', 'name' => 'Chapter 3']);
        Chapter::create(['number' => '4', 'name' => 'Chapter 4']);
        Chapter::create(['number' => '4.1', 'name' => 'Chapter 4.1']);
        Chapter::create(['number' => '4.1.1', 'name' => 'Chapter 4.1.1']);
    }
}
