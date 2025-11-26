@extends('admin.layouts.admin')

@section('title', 'Créer une Page')
@section('page-title', 'Créer une Page CMS')

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Nouvelle Page</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pages.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                               id="slug" name="slug" value="{{ old('slug') }}" required>
                        <div class="form-text">URL de la page (ex: accueil, a-propos, contact)</div>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror"
                               id="titre" name="titre" value="{{ old('titre') }}" required>
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="contenu_html" class="form-label">Contenu HTML</label>
                        <textarea class="form-control @error('contenu_html') is-invalid @enderror"
                                  id="contenu_html" name="contenu_html" rows="15">{{ old('contenu_html') }}</textarea>
                        <div class="form-text">Contenu HTML de la page (vous pouvez utiliser un éditeur WYSIWYG)</div>
                        @error('contenu_html')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Créer la page
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
