@extends('admin.layouts.admin')

@section('title', 'Modifier le Footer')
@section('page-title', 'Modifier le Footer')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-layout-text-window"></i> Contenus du footer
                </h5>
                <p class="text-muted small mb-0 mt-1">Gérez les informations affichées dans le pied de page du site</p>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('admin.footer.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach($footerSettings as $setting)
                        <div class="mb-3">
                            <label for="setting_{{ $setting->key }}" class="form-label fw-semibold">
                                {{ $setting->label }}
                            </label>
                            @if($setting->description)
                                <p class="text-muted small mb-2">{{ $setting->description }}</p>
                            @endif
                            <input
                                type="text"
                                class="form-control @error('settings.' . $setting->key) is-invalid @enderror"
                                id="setting_{{ $setting->key }}"
                                name="settings[{{ $setting->key }}]"
                                value="{{ old('settings.' . $setting->key, $setting->value) }}"
                            >
                            @error('settings.' . $setting->key)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
