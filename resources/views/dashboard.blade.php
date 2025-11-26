@extends('layouts.breeze')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Bienvenue !</h4>
                </div>
                <div class="card-body text-center py-5">
                    <i class="bi bi-check-circle text-success" style="font-size: 4rem;"></i>
                    <h5 class="mt-3">Vous êtes connecté avec succès !</h5>
                    <p class="text-muted mb-4">Redirection vers le dashboard administrateur...</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-speedometer2 me-2"></i>Accéder au Dashboard Admin
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Redirection automatique après 2 secondes
    setTimeout(function() {
        window.location.href = "{{ route('admin.dashboard') }}";
    }, 2000);
</script>
@endsection
