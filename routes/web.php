<?php

use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/questions', QuestionController::class);

    Route::post('/forum', [ForumController::class, 'reply'])->name('forum.reply');
});

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{question}',[ForumController::class, 'show'])->name('forum.show');

require __DIR__.'/auth.php';
