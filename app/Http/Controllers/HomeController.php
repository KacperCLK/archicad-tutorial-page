<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chapters = Chapter::with(['tutorials.hints'])->get();

        return view('pages.admin', ['chapters' => $chapters]);
    }
}
