<?php

namespace App\View\Components;

use App\Models\Chapter;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $chapters;
    public function __construct()
    {
        $this->chapters = Chapter::select('id', 'number', 'name')
            ->with(['tutorials' => function ($query) {
                $query->select('chapter_id', 'id', 'number', 'name')->orderBy('number', 'asc');
            }])
            ->orderBy('number', 'asc')
            ->get();
    }

    public function render()
    {
        return view('layouts.layouts-components.sidebar');
    }
}
