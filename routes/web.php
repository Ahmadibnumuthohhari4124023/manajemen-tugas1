<?php
Route::get('/debug-env', function () {
    return response()->json([
        'db_connection' => env('DB_CONNECTION'),
        'db_host' => env('DB_HOST'),
        'db_username' => env('DB_USERNAME'),
        'db_password_length' => strlen(env('DB_PASSWORD') ?? ''),
        'db_password_preview' => substr(env('DB_PASSWORD') ?? '', 0, 20) . '...',
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
