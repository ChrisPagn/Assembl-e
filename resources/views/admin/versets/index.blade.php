@extends('admin.layouts.admin')

@section('title', 'Gestion des Versets')
@section('page-title', 'Versets Bibliques')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste des versets (365 jours)</h5>
        <a href="{{ route('admin.versets.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouveau verset
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th width="80">Jour</th>
                        <th>Référence</th>
                        <th>Texte</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($versets as $verset)
                        <tr>
                            <td class="text-center"><strong>{{ $verset->jour_index }}</strong></td>
                            <td><span class="badge bg-primary">{{ $verset->reference }}</span></td>
                            <td>{{ Str::limit($verset->texte, 100) }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.versets.edit', $verset) }}" class="btn btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.versets.destroy', $verset) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ?');">
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
                            <td colspan="4" class="text-center text-muted py-4">Aucun verset.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $versets->links() }}
        </div>
    </div>
</div>
@endsection
