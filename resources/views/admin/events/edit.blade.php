@extends('admin.layouts.admin')

@section('title', 'Modifier l\'Événement')
@section('page-title', 'Modifier: ' . $event->titre)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Modifier l'Événement</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.events.update', $event) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.events._form')

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Enregistrer
                        </button>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle me-2"></i>Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
