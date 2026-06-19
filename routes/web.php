<?php
Route::get('/debug-env', function () {
    $pw = env('DB_PASSWORD') ?? '';
    return response()->json([
        'db_connection' => env('DB_CONNECTION'),
        'db_host' => env('DB_HOST'),
        'db_username' => env('DB_USERNAME'),
        'db_password_raw_length' => strlen($pw),
        'db_password_trimmed_length' => strlen(trim($pw)),
        'db_password_first_15' => substr($pw, 0, 15),
        'db_password_last_10' => substr($pw, -10),
        'has_trailing_whitespace' => $pw !== rtrim($pw),
        'has_leading_whitespace' => $pw !== ltrim($pw),
        'has_quotes' => str_contains($pw, '"') || str_contains($pw, "'"),
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
