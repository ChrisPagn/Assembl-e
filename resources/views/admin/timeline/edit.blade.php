@extends('admin.layouts.admin')

@section('title', 'Modifier l\'événement Timeline')
@section('page-title', 'Modifier: ' . $timeline->titre)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.timeline.update', $timeline) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="annee" class="form-label">Année <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('annee') is-invalid @enderror"
                               id="annee" name="annee" value="{{ old('annee', $timeline->annee) }}" required>
                        @error('annee')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror"
                               id="titre" name="titre" value="{{ old('titre', $timeline->titre) }}" required>
                        @error('titre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="4" required>{{ old('description', $timeline->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        @if($timeline->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $timeline->image) }}" alt="{{ $timeline->titre }}" class="img-thumbnail" style="max-height: 150px;">
                                <p class="small text-muted mt-1">Image actuelle</p>
                            </div>
                        @endif
                        <label for="image" class="form-label">Nouvelle image (optionnel)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="ordre" class="form-label">Ordre d'affichage <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('ordre') is-invalid @enderror"
                               id="ordre" name="ordre" value="{{ old('ordre', $timeline->ordre) }}" min="0" required>
                        @error('ordre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i>Enregistrer</button>
                        <a href="{{ route('admin.timeline.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-2"></i>Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
