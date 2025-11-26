@extends('admin.layouts.admin')

@section('title', 'Gestion des Événements')
@section('page-title', 'Événements')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste des événements</h5>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvel événement
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Lieu</th>
                        <th>Public</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td><strong>{{ $event->titre }}</strong></td>
                            <td>{{ $event->date_debut->format('d/m/Y H:i') }}</td>
                            <td>{{ $event->date_fin ? $event->date_fin->format('d/m/Y H:i') : '-' }}</td>
                            <td>{{ $event->lieu ?? '-' }}</td>
                            <td>
                                @if($event->est_public)
                                    <span class="badge bg-success">Public</span>
                                @else
                                    <span class="badge bg-secondary">Privé</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.events.show', $event) }}" class="btn btn-outline-info" title="Voir">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-outline-primary" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Aucun événement trouvé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection
