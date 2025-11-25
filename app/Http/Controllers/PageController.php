<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Verset;
use Carbon\Carbon;

class PageController extends Controller
{
    public function accueil()
    {
        $page = Page::where('slug', 'accueil')->firstOrFail();

        $dayOfYear = Carbon::now()->dayOfYear; // 1..365

        $versetDuJour = Verset::where('jour_index', $dayOfYear)->first()
            ?? Verset::inRandomOrder()->first();

        return view('pages.accueil', [
            'page'         => $page,
            'versetDuJour' => $versetDuJour,
        ]);
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
