<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Page;
use App\Models\Verset;
use App\Models\ContactMessage;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pages' => Page::count(),
            'events' => Event::count(),
            'versets' => Verset::count(),
            'contacts_non_lus' => ContactMessage::where('created_at', '>=', now()->subDays(7))->count(),
            'timeline_events' => TimelineEvent::count(),
        ];

        $recentContacts = ContactMessage::latest()->take(5)->get();
        $upcomingEvents = Event::where('date_debut', '>=', now())
            ->orderBy('date_debut')
            ->take(5)
            ->get();

        $timelineEvents = TimelineEvent::orderBy('ordre')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'upcomingEvents', 'timelineEvents'));
    }
}
