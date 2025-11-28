@extends('layouts.app')

@section('title', $page->titre)

@section('content')

    {{-- Contenu de la page --}}
    <section class="mb-5 fade-scroll">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm verse-card">
                    <div class="card-body">
                        <h1 class="h3 mb-4 text-center">{{ $page->titre }}</h1>
                        <div class="page-content">
                            {!! $page->contenu_html !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
