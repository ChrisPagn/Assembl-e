@extends('admin.layouts.admin')

@section('title', 'Message de Contact')
@section('page-title', 'Message de: ' . $contact->nom)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Message de Contact</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Retour
                </a>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nom</dt>
                    <dd class="col-sm-9">{{ $contact->nom }}</dd>

                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </dd>

                    <dt class="col-sm-3">Sujet</dt>
                    <dd class="col-sm-9">{{ $contact->sujet ?? 'Aucun sujet' }}</dd>

                    <dt class="col-sm-3">Message</dt>
                    <dd class="col-sm-9">
                        <div class="p-3 bg-light rounded">
                            {{ $contact->message }}
                        </div>
                    </dd>

                    <dt class="col-sm-3">Reçu le</dt>
                    <dd class="col-sm-9">{{ $contact->created_at->format('d/m/Y à H:i') }}</dd>
                </dl>

                <div class="mt-4">
                    <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->sujet }}" class="btn btn-primary">
                        <i class="bi bi-reply me-2"></i>Répondre par email
                    </a>
                    @if(auth()->user()->isAdmin())
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce message ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-2"></i>Supprimer
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
