<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Assemblée')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Favicon--}}
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo-assemblee-hogne.jpg') }}">

    {{-- Bootstrap via CDN pour commencer --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Style css --}}
     <link rel="stylesheet" href="{{ asset('css/styleAbout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleApp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleFooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleHome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleButtons.css') }}">

    {{-- CSS personnalisé dynamique - DOIT ÊTRE EN DERNIER pour écraser les valeurs --}}
    <link rel="stylesheet" href="{{ route('custom.css') }}"> 

</head>
<body class="d-flex flex-column min-vh-100">

{{-- Overlay de transition de page --}}
<div id="page-transition" class="page-transition">
    <div class="page-transition-inner">
        <img src="{{ asset('images/Logo_Colombe.png') }}"
             alt="Colombe"
             class="transition-dove">
    </div>
</div>

{{-- Nav manu --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('accueil') }}">
            <span class="logo-wrapper me-2">
                <img src="{{ asset('images/logo-assemblee-hogne.jpg') }}"
                    alt="Assemblée évangélique de Hogne"
                    class="logo-nav">
            </span>
            <span class="d-none d-sm-inline">
                Assemblée évangélique de Hogne.
            </span>
        </a>


        {{-- Bouton burger standard Bootstrap, avec style perso --}}
        <button class="navbar-toggler custom-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar"
                aria-expanded="false"
                aria-label="Basculer la navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
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
                @auth
                    <li class="nav-item">
                        <a class="nav-link custom-nav-link text-warning" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Admin
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link custom-nav-link text-info" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Connexion
                        </a>
                    </li>
                @endauth
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

        {{-- Ligne du haut : infos assemblée + contact --}}
        <div class="row align-items-start text-center text-md-start">
            <div class="col-md-6 mb-3">
                <h6 class="footer-title">Assemblée évangélique</h6>
                <p class="footer-description">
                    Nous vous acceuillons pour le culte le dimanche à 10h30.
                </p>
            </div>

            <div class="col-md-6 mb-3 text-md-end">
                <h6 class="footer-title">Contact</h6>
                <p>Email : info@assemblee.be</p>
                <p>Adresse : Rue Exemple 12, 5000 Namur</p>
            </div>
        </div>

         <hr class="footer-separator">

        {{-- Liens centrés --}}
        <div class="footer-nav-center">
            <ul class="footer-inline">
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li><a href="{{ route('a-propos') }}">À propos</a></li>
                <li><a href="{{ route('evenements') }}">Événements</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>

        <hr class="footer-separator">

        <p class="footer-copy text-center">&copy; {{ date('Y') }} Assemblée évangélique</p>
    </div>
</footer>


{{-- Bootstrap JS via CDN --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

{{-- Script de transitions --}}
<script src="{{ asset('js/page-transitions.js') }}"></script>

{{-- Script de fade-scroll --}}
<script src="{{ asset('js/fade-scroll.js') }}"></script>



</body>
</html>
