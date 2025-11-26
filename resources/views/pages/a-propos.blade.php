@extends('layouts.app')

@section('title', $page->titre)

@section('content')

    {{-- Présentation de l’assemblée (texte géré dans le back-office) --}}
    <section class="mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm verse-card fade-scroll">
                    <div class="card-body">
                        <h1 class="h3 mb-3 text-center">{{ $page->titre }}</h1>
                        <div class="page-content">
                            {!! $page->contenu_html !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Ligne du temps / Histoire de l’assemblée --}}
    <section class="history-timeline fade-scroll mb-5">
        <div class="card border-0 shadow-sm verse-card">
            <div class="card-body">
                <h2 class="h4 mb-4 text-center">Histoire de l’assemblée</h2>

                <div class="timeline-branch w-100">
                    <div class="timeline-content">
                        @foreach($etapes as $index => $etape)
                            <div class="timeline-node timeline-pos-{{ $index + 1 }}">
                                <div class="timeline-node-inner">
                                    <div class="timeline-year">
                                        {{ $etape['annee'] }}
                                    </div>
                                    @if(!empty($etape['image']))
                                        <img src="{{ asset('images/histoire/' . $etape['image']) }}"
                                            alt="{{ $etape['titre'] }}"
                                            class="timeline-img">
                                    @endif
                                    <div class="timeline-title">
                                        {{ $etape['titre'] }}
                                    </div>
                                    <div class="timeline-text">
                                        {{ $etape['texte'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>    
                </div>
            </div>
        </div>
    </section>

    {{-- Script d’animation séquentielle des bulles --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const nodes = document.querySelectorAll('.timeline-node');
            if (!nodes.length) return;

            let i = 0;
            nodes[i].classList.add('visible');

            setInterval(() => {
                nodes[i].classList.remove('visible');
                i = (i + 1) % nodes.length;
                nodes[i].classList.add('visible');
            }, 3000); // toutes les 3 secondes
        });
    </script>

@endsection
