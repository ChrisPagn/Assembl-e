@extends('admin.layouts.admin')

@section('title', 'Ajouter un événement Timeline')
@section('page-title', 'Nouvel événement Timeline')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.timeline.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="annee" class="form-label">Année <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('annee') is-invalid @enderror"
                               id="annee" name="annee" value="{{ old('annee') }}" placeholder="Ex: 1950, 1998, Aujourd'hui" required>
                        @error('annee')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror"
                               id="titre" name="titre" value="{{ old('titre') }}" required>
                        @error('titre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        <div class="form-text">Image illustrant l'événement (facultatif)</div>
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="ordre" class="form-label">Ordre d'affichage <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('ordre') is-invalid @enderror"
                               id="ordre" name="ordre" value="{{ old('ordre', 0) }}" min="0" required>
                        <div class="form-text">Plus le numéro est petit, plus l'événement apparaît en premier</div>
                        @error('ordre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i>Créer</button>
                        <a href="{{ route('admin.timeline.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-2"></i>Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
