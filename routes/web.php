<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskbitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Homepage
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Services Page
|--------------------------------------------------------------------------
*/

Route::get('/services', function () {

    $services = Service::where('status', 'active')
        ->latest()
        ->get();

    return view('services.index', compact('services'));

});

/*
|--------------------------------------------------------------------------
| Service Detail Page
|--------------------------------------------------------------------------
*/

Route::get('/service/{slug}', function ($slug) {

    $service = Service::where('slug', $slug)->firstOrFail();

    return view('services.show', compact('service'));

});

/*
|--------------------------------------------------------------------------
| Order Route
|--------------------------------------------------------------------------
*/

Route::post('/order/{service}', [OrderController::class, 'store'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| My Orders Page
|--------------------------------------------------------------------------
*/

Route::get('/my-orders', [OrderController::class, 'myOrders'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Order Detail Page (NEW)
|--------------------------------------------------------------------------
*/

Route::get('/orders/{order}', [OrderController::class, 'show'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Taskbits Routes
|--------------------------------------------------------------------------
*/

Route::get('/taskbits', [TaskbitController::class, 'index']);

Route::middleware('auth')->group(function () {

    Route::get('/taskbits/create', [TaskbitController::class, 'create']);
    Route::post('/taskbits', [TaskbitController::class, 'store']);

});

/*
|--------------------------------------------------------------------------
| Micraa Services (Post Service)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/create-service', [ServiceController::class, 'create']);
    Route::post('/create-service', [ServiceController::class, 'store']);

});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
