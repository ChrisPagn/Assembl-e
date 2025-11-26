@extends('admin.layouts.admin')

@section('title', 'Créer un Événement')
@section('page-title', 'Créer un Événement')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Nouvel Événement</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.events.store') }}" method="POST">
                    @csrf
                    @include('admin.events._form')

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Créer
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
