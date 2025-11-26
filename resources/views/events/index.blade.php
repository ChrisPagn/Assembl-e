@extends('layouts.app')

@section('title', 'Événements')

@section('content')

    {{-- En-tête + navigation par mois --}}
    <section class="mb-5 fade-scroll">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm verse-card">
                    <div class="card-body text-center">

                        @php
                            $labelMoisActuel = ucfirst($currentMonth->translatedFormat('F Y'));
                            $labelMoisPrev   = ucfirst($prevMonth->translatedFormat('F Y'));
                            $labelMoisNext   = ucfirst($nextMonth->translatedFormat('F Y'));
                        @endphp

                        <h1 class="h3 mb-3">Événements – {{ $labelMoisActuel }}</h1>
                        <p class="mb-4">
                            Retrouvez ici les cultes, réunions et activités de l’assemblée pour ce mois.
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('evenements', ['month' => $prevMonth->format('Y-m')]) }}"
                               class="btn btn-outline-secondary btn-sm">
                                &laquo; {{ $labelMoisPrev }}
                            </a>

                            <span class="fw-semibold">
                                {{ $labelMoisActuel }}
                            </span>

                            <a href="{{ route('evenements', ['month' => $nextMonth->format('Y-m')]) }}"
                               class="btn btn-outline-secondary btn-sm">
                                {{ $labelMoisNext }} &raquo;
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Liste des événements du mois sélectionné --}}
    <section class="fade-scroll mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                @forelse ($events as $event)
                    <div class="card event-card mb-4 fade-scroll">
                        <div class="card-body d-flex align-items-start">

                            {{-- Bloc date stylé, comme tu avais déjà --}}
                            <div class="event-date me-4 text-center">
                                <div class="event-day">
                                    {{ $event->date_debut->format('d') }}
                                </div>
                                <div class="event-month">
                                    {{ $event->date_debut->format('M') }}
                                </div>
                            </div>

                            <div>
                                <h4 class="h5 mb-2">{{ $event->titre }}</h4>
                                <p class="text-muted mb-1">
                                    {{ $event->date_debut->format('d/m/Y H:i') }}
                                    @if($event->lieu) – {{ $event->lieu }} @endif
                                </p>

                                @if($event->description)
                                    <p class="mb-0">{{ $event->description }}</p>
                                @endif
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-center mt-4">
                        Aucun événement prévu pour {{ strtolower($labelMoisActuel) }}.
                    </p>
                @endforelse

            </div>
        </div>
    </section>
@endsection
