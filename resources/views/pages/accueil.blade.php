@extends('layouts.app')

@section('title', $page->titre)

@section('content')

   {{-- HERO pleine largeur --}}
    <section class="hero-fullwidth">
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
<section class="verse-of-day my-5">
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
    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <section class="page-content">
                {!! $page->contenu_html !!}
            </section>
        </div>
    </div>



    {{-- Prochains événements --}}
    <section class="home-events py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div>
                    <h2 class="h4 mb-1">Prochains événements</h2>
                    <p class="mb-0 text-muted">
                        Retrouver les réunions, études bibliques et rencontres fraternelles à venir.
                    </p>
                </div>
                <a href="{{ route('evenements') }}" class="btn btn-success mt-3 mt-md-0">
                    Voir tous les événements
                </a>
            </div>
        </div>
    </section>
@endsection
