<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskbitController;
=======
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
>>>>>>> d2502ac339b6ae4b7b773a1667fb839f2685eb52

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Taskbits Routes
|--------------------------------------------------------------------------
*/

Route::get('/taskbits', [TaskbitController::class, 'index']);
Route::get('/taskbits/create', [TaskbitController::class, 'create']);
Route::post('/taskbits', [TaskbitController::class, 'store']);
=======
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\TaskbitController;

Route::get('/taskbits', [TaskbitController::class, 'index']);
>>>>>>> d2502ac339b6ae4b7b773a1667fb839f2685eb52
