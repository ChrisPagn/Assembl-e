<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Verset;
use App\Models\Event;
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

        // Plus tard, tu pourras charger ça depuis une table "histoire_assemblee"
        $etapes = [
            [
                'annee'   => '2025 avril - mai ',
                'titre'   => 'Premières réunions de maison',
                'image'   => 'histoire_1995.jpg',
                'texte'   => 'Quelques familles se réunissent pour la prière et l\'étude biblique.'
            ],
            [
                'annee'   => '2025 juin',
                'titre'   => 'Ouverture de l\'assemblée de Hogne',
                'image'   => 'histoire_2005.jpg',
                'texte'   => 'Nous avons décidés de nous rassemblée en tant qu\'église.'
            ],
            [
                'annee'   => '2025 août',
                'titre'   => 'Développement des activités',
                'image'   => 'histoire_2020.jpg',
                'texte'   => 'Mise en place d\'études bibliques, groupes de jeunes, et actions de soutien.'
            ],
        ];

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
}
