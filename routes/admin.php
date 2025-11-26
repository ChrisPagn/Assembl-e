<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\VersetController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\TimelineController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin.or.moderator'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestion des pages CMS (Admin uniquement pour modification)
    Route::resource('pages', AdminPageController::class)->except(['show']);

    // Gestion des événements (Admin et Modérateur)
    Route::resource('events', AdminEventController::class);

    // Gestion des versets (Admin uniquement)
    Route::middleware('admin')->group(function () {
        Route::resource('versets', VersetController::class);
    });

    // Messages de contact (Lecture seule pour tous)
    Route::get('contacts', [ContactMessageController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactMessageController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactMessageController::class, 'destroy'])->name('contacts.destroy')->middleware('admin');

    // Gestion de la timeline (Admin uniquement)
    Route::middleware('admin')->group(function () {
        Route::resource('timeline', TimelineController::class);
    });
});
