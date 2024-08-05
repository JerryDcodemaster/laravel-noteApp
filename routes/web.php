<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Show Create Note Form
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');

// Store user data
Route::post('/dashboard', [NoteController::class, 'store'])->name('note.store');

// View user data
Route::get('/dashboard', [NoteController::class, 'viewUserNotes'])->name('dashboard');

// Edit user data
Route::get('/notes/{id}/edit', [NoteController::class, 'editUserNotes'])->name('note.edit');

// Update Note
Route::put('/notes/{id}/update', [NoteController::class, 'updateUserNotes'])->name('note.update');

// Delete Note
Route::get('/note/{id}/destroy', [NoteController::class, 'deleteUserNotes'])->name('note.destroy');

// Profile Auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
