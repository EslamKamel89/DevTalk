<?php

use App\Http\Controllers\ForumIndexController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', ForumIndexController::class)->name('home');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
