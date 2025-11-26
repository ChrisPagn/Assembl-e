@extends('admin.layouts.admin')

@section('title', 'Modifier le Verset')
@section('page-title', 'Modifier: ' . $verset->reference)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.versets.update', $verset) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="jour_index" class="form-label">Jour de l'année (1-365) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('jour_index') is-invalid @enderror"
                               id="jour_index" name="jour_index" min="1" max="365" value="{{ old('jour_index', $verset->jour_index) }}" required>
                        @error('jour_index')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="reference" class="form-label">Référence <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                               id="reference" name="reference" value="{{ old('reference', $verset->reference) }}" required>
                        @error('reference')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="texte" class="form-label">Texte du verset <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('texte') is-invalid @enderror"
                                  id="texte" name="texte" rows="4" required>{{ old('texte', $verset->texte) }}</textarea>
                        @error('texte')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i>Enregistrer</button>
                        <a href="{{ route('admin.versets.index') }}" class="btn btn-secondary"><i class="bi bi-x-circle me-2"></i>Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
