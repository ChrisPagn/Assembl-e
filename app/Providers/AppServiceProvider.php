<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\MenuComposer;
use App\Models\Page;
use App\Observers\PageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Partager les pages de menu avec le layout app
        View::composer('layouts.app', MenuComposer::class);

        // Enregistrer l'Observer pour les pages
        Page::observe(PageObserver::class);
    }
}
