@extends('admin.layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <!-- Stat Cards -->
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Pages CMS</h6>
                        <h3 class="mb-0">{{ $stats['pages'] }}</h3>
                    </div>
                    <div class="text-primary" style="font-size: 2.5rem;">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Événements</h6>
                        <h3 class="mb-0">{{ $stats['events'] }}</h3>
                    </div>
                    <div class="text-success" style="font-size: 2.5rem;">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Versets</h6>
                        <h3 class="mb-0">{{ $stats['versets'] }}</h3>
                    </div>
                    <div class="text-info" style="font-size: 2.5rem;">
                        <i class="bi bi-book"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Messages (7 derniers jours)</h6>
                        <h3 class="mb-0">{{ $stats['contacts_non_lus'] }}</h3>
                    </div>
                    <div class="text-warning" style="font-size: 2.5rem;">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Contacts -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Messages récents</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary">
                    Voir tout <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="card-body">
                @forelse($recentContacts as $contact)
                    <div class="d-flex justify-content-between align-items-start mb-3 pb-3 border-bottom">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">{{ $contact->nom }}</h6>
                            <p class="text-muted small mb-1">{{ $contact->email }}</p>
                            <p class="mb-0 small">{{ Str::limit($contact->message, 80) }}</p>
                        </div>
                        <small class="text-muted ms-3">{{ $contact->created_at->diffForHumans() }}</small>
                    </div>
                @empty
                    <p class="text-muted mb-0">Aucun message récent.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Événements à venir</h5>
                <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-outline-primary">
                    Voir tout <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="card-body">
                @forelse($upcomingEvents as $event)
                    <div class="d-flex align-items-start mb-3 pb-3 border-bottom">
                        <div class="text-center me-3" style="min-width: 60px;">
                            <div class="fw-bold" style="font-size: 1.5rem;">{{ $event->date_debut->format('d') }}</div>
                            <div class="text-muted small">{{ $event->date_debut->translatedFormat('M') }}</div>
                        </div>
                        <div>
                            <h6 class="mb-1">{{ $event->titre }}</h6>
                            <p class="text-muted small mb-0">
                                <i class="bi bi-clock"></i> {{ $event->date_debut->format('H:i') }}
                                @if($event->lieu)
                                    <br><i class="bi bi-geo-alt"></i> {{ $event->lieu }}
                                @endif
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted mb-0">Aucun événement à venir.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Raccourcis rapides</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="{{ route('admin.events.create') }}" class="btn btn-outline-primary w-100">
                            <i class="bi bi-plus-circle me-2"></i>Nouvel événement
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-primary w-100">
                            <i class="bi bi-pencil-square me-2"></i>Modifier les pages
                        </a>
                    </div>
                    @if(auth()->user()->isAdmin())
                    <div class="col-md-4">
                        <a href="{{ route('admin.versets.create') }}" class="btn btn-outline-primary w-100">
                            <i class="bi bi-plus-circle me-2"></i>Ajouter un verset
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
