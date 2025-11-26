@extends('layouts.app')

@section('title', $page->titre)

@section('content')

    {{-- Carte de présentation (contenu admin) --}}
    <section class="mb-5 fade-scroll">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm verse-card">
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

    {{-- Formulaire de contact --}}
    <section class="mb-5 fade-scroll">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm verse-card">
                    <div class="card-body">

                        <h2 class="h4 mb-3 text-center">Nous écrire</h2>

                        {{-- Message de succès --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Affichage des erreurs --}}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom / Prénom</label>
                                <input type="text"
                                       id="nom"
                                       name="nom"
                                       class="form-control @error('nom') is-invalid @enderror"
                                       value="{{ old('nom') }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Adresse e-mail</label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value="{{ old('email') }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="sujet" class="form-label">Sujet</label>
                                <input type="text"
                                       id="sujet"
                                       name="sujet"
                                       class="form-control @error('sujet') is-invalid @enderror"
                                       value="{{ old('sujet') }}">
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea id="message"
                                          name="message"
                                          rows="5"
                                          class="form-control @error('message') is-invalid @enderror"
                                          required>{{ old('message') }}</textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">
                                    Envoyer le message
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
