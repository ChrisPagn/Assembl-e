<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'accueil'])->name('accueil');
Route::get('/a-propos', [PageController::class, 'aPropos'])->name('a-propos');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/evenements', [EventController::class, 'index'])->name('evenements');


