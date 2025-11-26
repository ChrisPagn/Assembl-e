@extends('admin.layouts.admin')

@section('title', 'Détails de l\'Événement')
@section('page-title', $event->titre)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Détails de l'Événement</h5>
                <div>
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil me-1"></i>Modifier
                    </a>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Retour
                    </a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Titre</dt>
                    <dd class="col-sm-9">{{ $event->titre }}</dd>

                    <dt class="col-sm-3">Description</dt>
                    <dd class="col-sm-9">{{ $event->description ?? 'Aucune description' }}</dd>

                    <dt class="col-sm-3">Date de début</dt>
                    <dd class="col-sm-9">{{ $event->date_debut->format('d/m/Y à H:i') }}</dd>

                    <dt class="col-sm-3">Date de fin</dt>
                    <dd class="col-sm-9">{{ $event->date_fin ? $event->date_fin->format('d/m/Y à H:i') : 'Non définie' }}</dd>

                    <dt class="col-sm-3">Lieu</dt>
                    <dd class="col-sm-9">{{ $event->lieu ?? 'Non spécifié' }}</dd>

                    <dt class="col-sm-3">Visibilité</dt>
                    <dd class="col-sm-9">
                        @if($event->est_public)
                            <span class="badge bg-success">Public</span>
                        @else
                            <span class="badge bg-secondary">Privé</span>
                        @endif
                    </dd>

                    <dt class="col-sm-3">Créé le</dt>
                    <dd class="col-sm-9">{{ $event->created_at->format('d/m/Y à H:i') }}</dd>

                    <dt class="col-sm-3">Modifié le</dt>
                    <dd class="col-sm-9">{{ $event->updated_at->format('d/m/Y à H:i') }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
