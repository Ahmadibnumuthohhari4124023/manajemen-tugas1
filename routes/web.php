<?php
Route::get('/debug-env', function () {
    $pw = env('DB_PASSWORD') ?? '';
    return response()->json([
        'db_password_sha256' => hash('sha256', $pw),
        'db_password_length' => strlen($pw),
    ]);
});
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
