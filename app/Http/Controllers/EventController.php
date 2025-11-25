<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('est_public', true)
            ->where('date_debut', '>=', now()->startOfDay())
            ->orderBy('date_debut')
            ->get();

        return view('events.index', compact('events'));
    }
}
