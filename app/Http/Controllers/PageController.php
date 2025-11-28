<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Verset;
use App\Models\Event;
use App\Models\TimelineEvent;
use Carbon\Carbon;

class PageController extends Controller
{
    public function accueil()
    {
        $page = Page::where('slug', 'accueil')->firstOrFail();

        // Verset du jour
        $dayOfYear = Carbon::now()->dayOfYear; // 1..365
        $versetDuJour = Verset::where('jour_index', $dayOfYear)->first()
            ?? Verset::inRandomOrder()->first();

        // --- 🔥 Nouvel ajout : événements du mois courant ---
        $currentMonth = Carbon::now()->startOfMonth();
        $start = $currentMonth->copy()->startOfMonth();
        $end   = $currentMonth->copy()->endOfMonth();

        $events = Event::whereBetween('date_debut', [$start, $end])
            ->orderBy('date_debut')
            ->take(3) // on en affiche max 3 pour la page d’accueil (facultatif)
            ->get();
        // ------------------------------------------------------

        return view('pages.accueil', [
            'page'         => $page,
            'versetDuJour' => $versetDuJour,
            'events'       => $events, // 👉 envoyé à la vue
        ]);
    }


    public function aPropos()
    {
        $page = Page::where('slug', 'a-propos')->firstOrFail();

        // Charger les événements de la timeline depuis la base de données
        $etapes = TimelineEvent::orderBy('ordre')->get()->map(function($event) {
            return [
                'annee'   => $event->annee,
                'titre'   => $event->titre,
                'image'   => $event->image,
                'texte'   => $event->description,
            ];
        });

        return view('pages.a-propos', [
            'page'   => $page,
            'etapes' => $etapes,
        ]);
    }


    public function contact()
    {
        $page = Page::where('slug', 'contact')->firstOrFail();
        return view('pages.contact', compact('page'));
    }

    /**
     * Afficher une page dynamique par son slug
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        // Si c'est une page spécifique avec une méthode dédiée, rediriger
        if (method_exists($this, $slug)) {
            return $this->$slug();
        }

        // Afficher la vue générique pour les pages CMS
        return view('pages.show', compact('page'));
    }
}
