<?php

namespace App\Http\Controllers;

use App\LinkService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $linkService;

    public function __construct(LinkService $linkService){
        // Metoda służąca do generowania linków - logika w Service - "LinkService.php"
        $this->linkService  = $linkService;
    }

    public function home()
    {
        return view('pages.home', ['links' => $this->linkService->getLinks('home')]);
    }
    
    public function coordChanger()
    {
        return view('pages.coord-changer', ['links' => $this->linkService->getLinks('coord-changer')]);
    }

    public function about()
    {
        return view('pages.about', ['links' => $this->linkService->getLinks('about')]);
    }

    public function contact()
    {
        return view('pages.contact', ['links' => $this->linkService->getLinks('contact')]);
    }

    public function tutorials()
    {
        return view('pages.tutorials', ['links' => $this->linkService->getLinks('tutorials')]);
    }
}
