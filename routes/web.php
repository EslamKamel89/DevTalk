<?php

use App\Http\Controllers\DiscussionShowController;
use App\Http\Controllers\DiscussionStoreController;
use App\Http\Controllers\ForumIndexController;
use App\Http\Controllers\MarkdownController;
use App\Http\Controllers\PostDeleteController;
use App\Http\Controllers\PostStoreController;
use App\Http\Controllers\PostUpdateController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', ForumIndexController::class)->name('home');
Route::get('/discussions/{discussion:slug}', DiscussionShowController::class)
    ->name('discussions.show');
Route::middleware(['auth'])->group(function () {
    Route::post('/discussions', DiscussionStoreController::class)
        ->name('discussions.store');
    Route::post('/discussions/{discussion:slug}/posts', PostStoreController::class)
        ->name('posts.store');
    Route::put('/posts/{post}', PostUpdateController::class)
        ->name('posts.update');
    Route::delete('/posts/{post}', PostDeleteController::class)
        ->name('posts.destroy');
});
// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
