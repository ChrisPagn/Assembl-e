<div class="mb-3">
    <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('titre') is-invalid @enderror"
           id="titre" name="titre" value="{{ old('titre', $event->titre ?? '') }}" required>
    @error('titre')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror"
              id="description" name="description" rows="5">{{ old('description', $event->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="date_debut" class="form-label">Date de début <span class="text-danger">*</span></label>
        <input type="datetime-local" class="form-control @error('date_debut') is-invalid @enderror"
               id="date_debut" name="date_debut"
               value="{{ old('date_debut', isset($event) ? $event->date_debut->format('Y-m-d\TH:i') : '') }}" required>
        @error('date_debut')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="date_fin" class="form-label">Date de fin</label>
        <input type="datetime-local" class="form-control @error('date_fin') is-invalid @enderror"
               id="date_fin" name="date_fin"
               value="{{ old('date_fin', isset($event) && $event->date_fin ? $event->date_fin->format('Y-m-d\TH:i') : '') }}">
        @error('date_fin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label for="lieu" class="form-label">Lieu</label>
    <input type="text" class="form-control @error('lieu') is-invalid @enderror"
           id="lieu" name="lieu" value="{{ old('lieu', $event->lieu ?? '') }}">
    @error('lieu')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="hidden" name="est_public" value="0">
    <input type="checkbox" class="form-check-input" id="est_public" name="est_public" value="1"
           {{ old('est_public', $event->est_public ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="est_public">
        Événement public (visible sur le site)
    </label>
</div>
