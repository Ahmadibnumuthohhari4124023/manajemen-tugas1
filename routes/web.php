<?php

// Tambahkan baris-baris berikut ke dalam routes/web.php milikmu,
// di bawah use Illuminate\Support\Facades\Route; yang sudah ada.

use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('home');
Route::resource('tasks', TaskController::class);

// Route::resource() di atas otomatis membuat 7 route CRUD standar:
// GET    /tasks            -> index
// GET    /tasks/create      -> create
// POST   /tasks             -> store
// GET    /tasks/{task}/edit -> edit
// PUT    /tasks/{task}      -> update
// DELETE /tasks/{task}      -> destroy
