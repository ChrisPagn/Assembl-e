@extends('admin.layouts.admin')

@section('title', 'Détails Timeline')
@section('page-title', $timeline->titre)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $timeline->annee }} - {{ $timeline->titre }}</h5>
                <div>
                    <a href="{{ route('admin.timeline.edit', $timeline) }}" class="btn btn-sm btn-primary">Modifier</a>
                    <a href="{{ route('admin.timeline.index') }}" class="btn btn-sm btn-secondary">Retour</a>
                </div>
            </div>
            <div class="card-body">
                @if($timeline->image)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $timeline->image) }}" alt="{{ $timeline->titre }}" class="img-fluid rounded" style="max-height: 400px;">
                    </div>
                @endif

                <dl class="row">
                    <dt class="col-sm-3">Année</dt>
                    <dd class="col-sm-9"><span class="badge bg-info fs-6">{{ $timeline->annee }}</span></dd>

                    <dt class="col-sm-3">Titre</dt>
                    <dd class="col-sm-9">{{ $timeline->titre }}</dd>

                    <dt class="col-sm-3">Description</dt>
                    <dd class="col-sm-9">{{ $timeline->description }}</dd>

                    <dt class="col-sm-3">Ordre</dt>
                    <dd class="col-sm-9">{{ $timeline->ordre }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
