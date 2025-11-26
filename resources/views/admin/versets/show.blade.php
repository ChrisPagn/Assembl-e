@extends('admin.layouts.admin')

@section('title', 'Détails du Verset')
@section('page-title', 'Verset du jour ' . $verset->jour_index)

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $verset->reference }}</h5>
                <div>
                    <a href="{{ route('admin.versets.edit', $verset) }}" class="btn btn-sm btn-primary">Modifier</a>
                    <a href="{{ route('admin.versets.index') }}" class="btn btn-sm btn-secondary">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Jour</dt>
                    <dd class="col-sm-9">{{ $verset->jour_index }} / 365</dd>

                    <dt class="col-sm-3">Référence</dt>
                    <dd class="col-sm-9"><span class="badge bg-primary fs-6">{{ $verset->reference }}</span></dd>

                    <dt class="col-sm-3">Texte</dt>
                    <dd class="col-sm-9">
                        <div class="p-3 bg-light rounded">
                            <p class="mb-0" style="font-size: 1.1rem; line-height: 1.6;">{{ $verset->texte }}</p>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection
