<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Assemblée')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap via CDN pour commencer --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/styleMenu.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/styleFooter.css') }}">

</head>
<body class="d-flex flex-column min-vh-100">

{{-- Nav manu --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('accueil') }}">Assemblée évangélique</a>

        {{-- Checkbox cachée pour contrôler l’ouverture du menu --}}
        <input type="checkbox" id="nav-toggle" class="nav-toggle">

        {{-- Bouton burger lié à la checkbox --}}
        <label class="navbar-toggler custom-toggler" for="nav-toggle" aria-label="Basculer la navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
        </label>

        <div class="navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('accueil') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('a-propos') }}">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('evenements') }}">Événements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

  {{-- Prochain evenements --}}
<div class="container mb-5">
    @yield('content')
</div>


  {{-- Footer --}}
<footer class="footer-links mt-auto">
    <div class="container">
        <div class="row text-center text-md-start">
            <div class="col-md-4 mb-3">
                <h6 class="footer-title">Assemblée évangélique</h6>
                <p class="footer-description">Un lieu de prière, d’enseignement, de communion fraternelle.</p>
            </div>

            <div class="col-md-4 mb-3">
                <h6 class="footer-title">Liens rapides</h6>
                <ul class="footer-list">
                    <li><a href="{{ route('accueil') }}">Accueil</a></li>
                    <li><a href="{{ route('a-propos') }}">À propos</a></li>
                    <li><a href="{{ route('evenements') }}">Événements</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-3">
                <h6 class="footer-title">Contact</h6>
                <p>Email : info@assemblee.be</p>
                <p>Adresse : Rue Exemple 12, 5000 Namur</p>
            </div>
        </div>

        <hr class="footer-separator">

        <p class="footer-copy text-center">&copy; {{ date('Y') }} Assemblée évangélique</p>
    </div>
</footer>

</body>
</html>
