@extends('admin.layouts.admin')

@section('title', 'Gestion des Pages CMS')
@section('page-title', 'Pages CMS')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Liste des pages</h5>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Nouvelle page
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Slug</th>
                        <th>Titre</th>
                        <th>Date de création</th>
                        <th>Dernière modification</th>
                        <th width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages as $page)
                        <tr>
                            <td><code>{{ $page->slug }}</code></td>
                            <td>{{ $page->titre }}</td>
                            <td>{{ $page->created_at->format('d/m/Y') }}</td>
                            <td>{{ $page->updated_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-outline-primary" title="Modifier">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette page ?');">
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
                            <td colspan="5" class="text-center text-muted py-4">
                                Aucune page trouvée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
