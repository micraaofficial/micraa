<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskbitController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Taskbits Routes
|--------------------------------------------------------------------------
*/

Route::get('/taskbits', [TaskbitController::class, 'index']);
Route::get('/taskbits/create', [TaskbitController::class, 'create']);
Route::post('/taskbits', [TaskbitController::class, 'store']);
