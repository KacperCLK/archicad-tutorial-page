<?php

namespace App\Http\Controllers;

use App\LinkService;
use App\Models\Chapter;
use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    protected $linkService;

    public function __construct(LinkService $linkService)
    {
        // Metoda służąca do generowania linków - logika w Service - "LinkService.php"
        $this->linkService = $linkService;
    }

    public function index()
    {
        $chapters = Chapter::with(['tutorials' => function($query) {
            $query->orderBy('number', 'asc'); // Sortowanie tutoriali po numerze
        }])->orderBy('number', 'asc')->get(); // Sortowanie rozdziałów po numerze
        
        return view(
            'pages.tutorials.index', [
                'links' => $this->linkService->getLinks('tutorials.index'),
                'chapters' => $chapters,
            ]);
    }

    public function show(Tutorial $tutorial)
    {
        $tutorial->load('hints');
        $chapterNumber = $tutorial->chapter->number;
        $hints = $tutorial->hints->map(function ($hint) {
            return [
                'id' => $hint->id,
                'name' => $hint->name,
            ];
        });

        return view('pages.tutorials.show', [
            'tutorial' => $tutorial,
            'hints' => $hints,
            'chapterNumber' => $chapterNumber,
            'links' => $this->linkService->getLinks('tutorials.index'),
        ]);
    }
}
