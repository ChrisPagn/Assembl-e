@extends('admin.layouts.admin')

@section('title', 'Modifier la Page')
@section('page-title', 'Modifier la Page: ' . $page->titre)

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Modifier la Page</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                               id="slug" name="slug" value="{{ old('slug', $page->slug) }}" required>
                        <div class="form-text">URL de la page (ex: accueil, a-propos, contact)</div>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror"
                               id="titre" name="titre" value="{{ old('titre', $page->titre) }}" required>
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contenu_html" class="form-label">Contenu HTML</label>
                        <textarea class="form-control @error('contenu_html') is-invalid @enderror"
                                  id="contenu_html" name="contenu_html" rows="15">{{ old('contenu_html', $page->contenu_html) }}</textarea>
                        <div class="form-text">Contenu HTML de la page</div>
                        @error('contenu_html')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($page->slug === 'accueil')
                        <hr class="my-4">
                        <h6 class="mb-3"><i class="bi bi-info-circle"></i> Infos pratiques (spécifique à la page d'accueil)</h6>

                        <div class="mb-3">
                            <label for="hero_subtitle" class="form-label">Sous-titre Hero</label>
                            <input type="text" class="form-control @error('hero_subtitle') is-invalid @enderror"
                                   id="hero_subtitle" name="hero_subtitle" value="{{ old('hero_subtitle', $page->hero_subtitle) }}">
                            <div class="form-text">Sous-titre affiché dans la bannière</div>
                            @error('hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="info_culte" class="form-label">Info Culte du dimanche</label>
                            <input type="text" class="form-control @error('info_culte') is-invalid @enderror"
                                   id="info_culte" name="info_culte" value="{{ old('info_culte', $page->info_culte) }}">
                            <div class="form-text">Informations sur le culte (ex: 10h30 – temps de louange, prière et prédication.)</div>
                            @error('info_culte')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="info_adresse" class="form-label">Adresse</label>
                            <textarea class="form-control @error('info_adresse') is-invalid @enderror"
                                      id="info_adresse" name="info_adresse" rows="3">{{ old('info_adresse', $page->info_adresse) }}</textarea>
                            <div class="form-text">Adresse de l'assemblée (HTML autorisé: &lt;br&gt; pour saut de ligne)</div>
                            @error('info_adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="info_message" class="form-label">Message d'accueil</label>
                            <textarea class="form-control @error('info_message') is-invalid @enderror"
                                      id="info_message" name="info_message" rows="2">{{ old('info_message', $page->info_message) }}</textarea>
                            <div class="form-text">Message d'accueil dans les infos pratiques</div>
                            @error('info_message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Enregistrer
                        </button>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

