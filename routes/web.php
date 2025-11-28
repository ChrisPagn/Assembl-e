<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StyleController;
use Illuminate\Support\Facades\Route;

// CSS personnalisé dynamique
Route::get('/css/custom.css', [StyleController::class, 'customCss'])->name('custom.css');

// Routes publiques du site
Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/evenements', [EventController::class, 'index'])->name('evenements');

// Route dynamique pour les pages CMS (doit être en dernier)
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show')->where('slug', '[a-z0-9\-]+');

// Route dashboard Breeze (redirige vers admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes de profil Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
