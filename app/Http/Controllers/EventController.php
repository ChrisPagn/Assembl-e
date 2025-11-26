<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // 1) Mois demandé dans l’URL ? ex: /evenements?month=2025-11
        $monthParam = $request->query('month'); // format "Y-m"

        if ($monthParam) {
            $currentMonth = Carbon::createFromFormat('Y-m', $monthParam)->startOfMonth();
        } else {
            $currentMonth = Carbon::now()->startOfMonth(); // mois courant par défaut
        }

        // 2) bornes du mois
        $start = $currentMonth->copy()->startOfMonth();
        $end   = $currentMonth->copy()->endOfMonth();

        // 3) événements uniquement pour ce mois
        $events = Event::whereBetween('date_debut', [$start, $end])
            ->orderBy('date_debut')
            ->get();

        // 4) mois précédent / suivant (pour les boutons)
        $prevMonth = $currentMonth->copy()->subMonth();
        $nextMonth = $currentMonth->copy()->addMonth();

        return view('events.index', [
            'events'       => $events,
            'currentMonth' => $currentMonth,
            'prevMonth'    => $prevMonth,
            'nextMonth'    => $nextMonth,
        ]);

    }
}