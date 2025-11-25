<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Assemblée')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap via CDN pour commencer --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('accueil') }}">Assemblée évangélique</a>
        <div>
            <a class="nav-link d-inline-block text-light" href="{{ route('accueil') }}">Accueil</a>
            <a class="nav-link d-inline-block text-light" href="{{ route('a-propos') }}">À propos</a>
            <a class="nav-link d-inline-block text-light" href="{{ route('evenements') }}">Événements</a>
            <a class="nav-link d-inline-block text-light" href="{{ route('contact') }}">Contact</a>
        </div>
    </div>
</nav>

<div class="container mb-5">
    @yield('content')
</div>

<footer class="bg-light py-3 mt-auto">
    <div class="container text-center">
        <small>&copy; {{ date('Y') }} Assemblée évangélique</small>
    </div>
</footer>
</body>
</html>
