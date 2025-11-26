@extends('admin.layouts.admin')

@section('title', 'Gestion de la Timeline')
@section('page-title', 'Timeline / Historique')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Événements de la timeline</h5>
        <a href="{{ route('admin.timeline.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvel événement
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="60">Ordre</th>
                        <th>Année</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($timeline as $item)
                        <tr>
                            <td class="text-center"><strong>{{ $item->ordre }}</strong></td>
                            <td><span class="badge bg-info">{{ $item->annee }}</span></td>
                            <td>{{ $item->titre }}</td>
                            <td>{{ Str::limit($item->description, 60) }}</td>
                            <td>
                                @if($item->image)
                                    <span class="badge bg-success"><i class="bi bi-image"></i> Oui</span>
                                @else
                                    <span class="badge bg-secondary">Non</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.timeline.edit', $item) }}" class="btn btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.timeline.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Aucun événement dans la timeline.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
