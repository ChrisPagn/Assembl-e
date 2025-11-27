<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Admin') - Assemblée Évangélique de Hogne</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS personnalisé dynamique -->
    <link rel="stylesheet" href="{{ route('custom.css') }}">

    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
        }

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #2c3e50 0%, #34495e 100%);
            color: #ecf0f1;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar .logo {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar .logo h4 {
            color: #fff;
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .sidebar .nav-link {
            color: #bdc3c7;
            padding: 0.75rem 1.25rem;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            color: #fff;
            border-left-color: #3498db;
        }

        .sidebar .nav-link.active {
            background-color: rgba(52, 152, 219, 0.1);
            color: #fff;
            border-left-color: #3498db;
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
        }

        .topbar {
            height: var(--header-height);
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }

        .content-area {
            padding: 2rem;
        }

        .card {
            border: none;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 2px solid #f1f3f5;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        .badge-role-admin {
            background-color: #e74c3c;
        }

        .badge-role-moderateur {
            background-color: #3498db;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .alert {
            border-radius: 8px;
            border: none;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">
            <h4>Admin Panel</h4>
            <small class="text-muted">Assemblée Hogne</small>
        </div>

        <nav class="nav flex-column mt-3">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>

            <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i> Pages CMS
            </a>

            <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event"></i> Événements
            </a>

            @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.versets.index') }}" class="nav-link {{ request()->routeIs('admin.versets.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i> Versets
            </a>

            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i> Utilisateurs
            </a>
            @endif

            <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="bi bi-envelope"></i> Messages Contact
            </a>

            @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.timeline.index') }}" class="nav-link {{ request()->routeIs('admin.timeline.*') ? 'active' : '' }}">
                <i class="bi bi-clock-history"></i> Timeline
            </a>

            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <i class="bi bi-palette"></i> Apparence
            </a>

            <a href="{{ route('admin.footer.edit') }}" class="nav-link {{ request()->routeIs('admin.footer.*') ? 'active' : '' }}">
                <i class="bi bi-layout-text-window"></i> Footer
            </a>
            @endif

            <hr class="my-3" style="border-color: rgba(255,255,255,0.1);">

            <a href="{{ route('accueil') }}" class="nav-link" target="_blank">
                <i class="bi bi-box-arrow-up-right"></i> Voir le site
            </a>

            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent text-start w-100">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div>
                <h5 class="mb-0">@yield('page-title', 'Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="badge badge-role-{{ auth()->user()->role }}">
                    {{ ucfirst(auth()->user()->role) }}
                </span>
                <span>{{ auth()->user()->name }}</span>
            </div>
        </header>

        <!-- Content -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Erreurs de validation :</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    {{-- CKEditor 5 Classic --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editorElement = document.querySelector('#contenu_html');

            if (editorElement) {
                ClassicEditor
                    .create(editorElement)
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
</body>
</html>
