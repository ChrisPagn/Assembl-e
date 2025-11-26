@extends('layouts.app')

@section('title', $page->titre)

@section('content')

   {{-- HERO pleine largeur --}}
    <section class="hero-fullwidth fade-scroll">
        <div class="hero-overlay text-center">
            <img src="{{ asset('images/Logo_Colombe.png') }}"
                alt="Assemblée évangélique de Hogne"
                class="hero-logo mb-3">
            <h1 class="hero-title">{{ $page->titre }}</h1>
            <p class="hero-subtitle">
                Un lieu de prière, d’enseignement et de communion fraternelle.
            </p>
        </div>
    </section>


    {{-- Verset du jour --}}
    <section class="verse-of-day my-5 fade-scroll">
        <div class="card border-0 shadow-sm verse-card">
            <div class="card-body text-center">
                <h2 class="h5 mb-3 text-uppercase text-muted">Verset du jour</h2>

                @if($versetDuJour)
                    <p class="verse-text mb-2">
                        « {{ $versetDuJour->texte }} »
                    </p>
                    <p class="verse-ref mb-0 text-muted">
                        {{ $versetDuJour->reference }}
                    </p>
                @else
                    <p class="text-muted mb-0">
                        Verset du jour indisponible pour le moment.
                    </p>
                @endif
            </div>
        </div>
    </section>


    {{-- Contenu de la page (texte géré dans le back-office) --}}
    {{-- Section de bienvenue --}}
    <section class="welcome-section my-5 fade-scroll">
        <div class="row g-4 align-items-stretch">

            {{-- Texte de bienvenue --}}
            <div class="col-lg-7">
                <div class="welcome-text card border-0 shadow-sm h-100">
                    <div class="card-body">
                        {!! $page->contenu_html !!}
                    </div>
                </div>
            </div>

            {{-- Infos pratiques --}}
            <div class="col-lg-5">
                <div class="welcome-info card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Infos pratiques</h3>

                        <p class="mb-2">
                            <strong>Culte du dimanche</strong><br>
                            10h30 – temps de louange, prière et prédication.
                        </p>

                        <p class="mb-2">
                            <strong>Adresse</strong><br>
                            Rue Exemple 12<br>
                            5000 Namur
                        </p>

                        <p class="mb-0 text-muted" style="font-size: 0.9rem;">
                            Vous êtes les bienvenus, que vous soyez habitué ou simplement en recherche.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>




{{-- Prochains événements --}}
<section class="home-events py-4 fade-scroll">
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            {{-- Titre + texte d’intro --}}
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <h2 class="h4 mb-1">Prochains événements</h2>
                    <p class="mb-0 text-muted">
                        Retrouver les réunions, études bibliques et rencontres fraternelles à venir.
                    </p>
                </div>

                <div class="mt-3 mt-md-0">
                    <a href="{{ route('evenements') }}" class="btn btn-success">
                        Voir tous les événements
                    </a>
                </div>
            </div>

            {{-- Liste des évènements du mois courant --}}
            @if($events->isNotEmpty())
                <div class="row g-3 mt-4">
                    @foreach($events as $event)
                        <div class="col-12 col-md-4">
                            <div class="card event-mini-card h-100">
                                <div class="card-body d-flex">
                                    <div class="event-date-mini text-center me-3">
                                        <div class="event-day-mini">
                                            {{ $event->date_debut->format('d') }}
                                        </div>
                                        <div class="event-month-mini">
                                            {{ $event->date_debut->format('M') }}
                                        </div>
                                    </div>

                                    <div class="flex-grow-1">
                                        <h4 class="h6 mb-1">{{ $event->titre }}</h4>
                                        <p class="text-muted mb-1 small">
                                            {{ $event->date_debut->format('d/m/Y H:i') }}
                                            @if($event->lieu)
                                                – {{ $event->lieu }}
                                            @endif
                                        </p>
                                        @if($event->description)
                                            <p class="mb-0 small">
                                                {{ \Illuminate\Support\Str::limit($event->description, 90) }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted mt-3 mb-0">
                    Aucun événement prévu pour ce mois-ci.
                </p>
            @endif

        </div>
    </div>
</section>



   
</section>

@endsection
