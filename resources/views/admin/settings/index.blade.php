@extends('admin.layouts.admin')

@section('title', 'Paramètres du site')
@section('page-title', 'Paramètres du site')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-palette"></i> Apparence du site
                </h5>
                <p class="text-muted small mb-0 mt-1">Personnalisez les couleurs et la police de votre site web</p>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Couleurs -->
                    <div class="mb-5">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="bi bi-palette-fill text-primary"></i> Couleurs
                        </h6>
                        <div class="row g-3">
                            @foreach($settings->where('type', 'color') as $setting)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <label for="setting_{{ $setting->key }}" class="form-label fw-semibold">
                                                {{ $setting->label }}
                                            </label>
                                            @if($setting->description)
                                                <p class="text-muted small mb-2">{{ $setting->description }}</p>
                                            @endif
                                            <div class="input-group">
                                                <input
                                                    type="color"
                                                    class="form-control form-control-color"
                                                    id="setting_{{ $setting->key }}"
                                                    name="settings[{{ $setting->key }}]"
                                                    value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                                    style="width: 60px;"
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                                    readonly
                                                    style="background-color: white;"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Polices -->
                    <div class="mb-5">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="bi bi-fonts text-success"></i> Typographie
                        </h6>
                        <div class="row g-3">
                            @foreach($settings->where('type', 'font') as $setting)
                                <div class="col-md-6">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <label for="setting_{{ $setting->key }}" class="form-label fw-semibold">
                                                {{ $setting->label }}
                                            </label>
                                            @if($setting->description)
                                                <p class="text-muted small mb-2">{{ $setting->description }}</p>
                                            @endif
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="setting_{{ $setting->key }}"
                                                name="settings[{{ $setting->key }}]"
                                                value="{{ old('settings.' . $setting->key, $setting->value) }}"
                                                placeholder="Ex: 'Arial', sans-serif"
                                            >
                                            <small class="text-muted">
                                                Exemple de rendu :
                                                <span style="font-family: {{ $setting->value }}; font-size: 1.1rem;">
                                                    Le renard brun saute par-dessus le chien paresseux
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Aperçu en direct -->
                    <div class="mb-4">
                        <h6 class="border-bottom pb-2 mb-3">
                            <i class="bi bi-eye text-info"></i> Aperçu
                        </h6>
                        <div class="card">
                            <div class="card-body" id="preview-section">
                                <div class="text-center py-4" style="font-family: var(--font-primary);">
                                    <h2 style="color: var(--color-primary);">Titre Principal</h2>
                                    <p style="color: var(--color-text);">Ceci est un exemple de texte avec vos paramètres.</p>
                                    <button type="button" class="btn" style="background-color: var(--color-primary); color: white;">
                                        Bouton exemple
                                    </button>
                                    <button type="button" class="btn" style="background-color: var(--color-secondary); color: white;">
                                        Bouton secondaire
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
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

@push('styles')
<style>
    :root {
        @foreach($settings->where('type', 'color') as $setting)
        --{{ str_replace('_', '-', $setting->key) }}: {{ $setting->value }};
        @endforeach
        @foreach($settings->where('type', 'font') as $setting)
        --{{ str_replace('_', '-', $setting->key) }}: {{ $setting->value }};
        @endforeach
    }
</style>
@endpush

@push('scripts')
<script>
    // Mise à jour en temps réel de l'aperçu des couleurs
    document.querySelectorAll('input[type="color"]').forEach(input => {
        input.addEventListener('input', function(e) {
            const textInput = this.parentElement.querySelector('input[type="text"]');
            textInput.value = this.value;

            // Mettre à jour la variable CSS
            const varName = '--' + this.name.replace('settings[', '').replace(']', '').replace(/_/g, '-');
            document.documentElement.style.setProperty(varName, this.value);
        });
    });

    // Mise à jour en temps réel de l'aperçu des polices
    document.querySelectorAll('input[name^="settings[font_"]').forEach(input => {
        input.addEventListener('input', function(e) {
            const varName = '--' + this.name.replace('settings[', '').replace(']', '').replace(/_/g, '-');
            document.documentElement.style.setProperty(varName, this.value);
        });
    });
</script>
@endpush
@endsection
