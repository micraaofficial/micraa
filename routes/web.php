<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CategoryController;

use App\Models\Service;
use App\Models\Favorite;

/*
|--------------------------------------------------------------------------
| HOME + SEARCH
|--------------------------------------------------------------------------
*/

Route::get('/', [ServiceController::class, 'index'])->name('home');
Route::get('/search', [ServiceController::class, 'search'])->name('services.search');

/*
|--------------------------------------------------------------------------
| SERVICE DETAIL
|--------------------------------------------------------------------------
*/

Route::get('/services/{slug}', function ($slug) {

    $service = \App\Models\Service::where('slug', $slug)
        ->with('reviews.user')
        ->firstOrFail();

    return view('service', compact('service'));

})->name('service.show');

/*
|--------------------------------------------------------------------------
| TASKBIT DETAIL (🔥 NEW ADDED)
|--------------------------------------------------------------------------
*/

Route::get('/taskbit/{id}', function ($id) {

    $taskbit = Service::findOrFail($id); // using same Service model

    return view('taskbits.show', compact('taskbit'));

})->name('taskbit.show');

/*
|--------------------------------------------------------------------------
| FAVORITES
|--------------------------------------------------------------------------
*/

Route::post('/favorite/{service_id}', [FavoriteController::class, 'toggle'])->middleware('auth');

Route::get('/favorites', function () {
    $favorites = Favorite::where('user_id', auth()->id())
        ->with('service')
        ->get();

    return view('favorites', compact('favorites'));
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $services = Service::where('user_id', auth()->id())->get();
    $totalListings = $services->count();
    $earnings = $services->sum('price');

    return view('dashboard', compact('totalListings', 'services', 'earnings'));

})->name('dashboard');

/*
|--------------------------------------------------------------------------
| MY TASKBITS
|--------------------------------------------------------------------------
*/

Route::get('/my-taskbit', function () {
    $services = Service::where('user_id', auth()->id())->get();
    return view('my-services', compact('services'));
});

/*
|--------------------------------------------------------------------------
| CREATE TASKBIT
|--------------------------------------------------------------------------
*/

Route::get('/create-taskbit', [ServiceController::class, 'create']);
Route::post('/create-taskbit', [ServiceController::class, 'store']);

/*
|--------------------------------------------------------------------------
| EDIT / DELETE
|--------------------------------------------------------------------------
*/

Route::get('/edit-taskbit/{id}', [ServiceController::class, 'edit']);
Route::post('/update-taskbit/{id}', [ServiceController::class, 'update']);
Route::get('/delete-service/{id}', [ServiceController::class, 'delete']);

/*
|--------------------------------------------------------------------------
| MESSAGES
|--------------------------------------------------------------------------
*/

Route::get('/messages', [MessageController::class, 'index']);
Route::post('/send-message', [MessageController::class, 'store'])->name('send.message');

/*
|--------------------------------------------------------------------------
| SETTINGS
|--------------------------------------------------------------------------
*/

Route::get('/settings', function () {
    return view('settings');
});

/*
|--------------------------------------------------------------------------
| AVATAR UPLOAD
|--------------------------------------------------------------------------
*/

Route::post('/update-avatar', function (Request $request) {

    $request->validate([
        'avatar' => 'image|max:2048'
    ]);

    $path = $request->file('avatar')->store('avatars', 'public');

    $user = auth()->user();
    $user->avatar = $path;
    $user->save();

    return back();
});

/*
|--------------------------------------------------------------------------
| UPDATE PROFILE
|--------------------------------------------------------------------------
*/

Route::post('/update-profile', function (Request $request) {

    $user = auth()->user();

    $user->name = $request->name;
    $user->email = $request->email;
    $user->bio = $request->bio;

    if ($request->password) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect('/dashboard');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

/*
|--------------------------------------------------------------------------
| SELLER
|--------------------------------------------------------------------------
*/

Route::get('/seller', fn() => view('seller'));
Route::get('/seller/register', fn() => view('seller.register'));

Route::post('/seller/register', function (Request $request) {

    $user = new App\Models\User;

    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);

    $user->save();

    Auth::login($user);

    return redirect('/dashboard');
});

/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ORDER + CHAT (NEW)
|--------------------------------------------------------------------------
*/

Route::get('/order/{id}', function ($id) {
    $taskbit = \App\Models\Service::findOrFail($id);
    return view('order', compact('taskbit'));
})->name('order.create');


Route::get('/chat/{user}', function ($user) {
    return view('chat', ['user_id' => $user]);
})->name('chat.start');

/*
|--------------------------------------------------------------------------
| SAVE ORDER (🔥 ADD HERE)
|--------------------------------------------------------------------------
*/

Route::post('/save-order', function (\Illuminate\Http\Request $request) {

    \App\Models\Order::create([
        'user_id' => auth()->id(),
        'service_id' => $request->taskbit_id,
        'price' => $request->amount,
        'status' => 'paid'
    ]);

    return response()->json(['success' => true]);
});

/*
|--------------------------------------------------------------------------
| CATEGORY ROUTES (⚠️ ALWAYS LAST)
|--------------------------------------------------------------------------
*/

Route::get('/{category}', [CategoryController::class, 'category']);
Route::get('/{category}/{subcategory}', [CategoryController::class, 'subcategory']);
Route::get('/{category}/{subcategory}/{micro}', [CategoryController::class, 'micro']);

