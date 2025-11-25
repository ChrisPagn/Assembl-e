<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function accueil()
    {
        $page = Page::where('slug', 'accueil')->firstOrFail();
        return view('pages.accueil', compact('page'));
    }

    public function aPropos()
    {
        $page = Page::where('slug', 'a-propos')->firstOrFail();
        return view('pages.a-propos', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->firstOrFail();
        return view('pages.contact', compact('page'));
    }
}
