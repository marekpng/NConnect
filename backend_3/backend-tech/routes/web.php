<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\StageUserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route::get('/admin/login', 'AdminAuthController@showLoginForm')->name('admin.login');
Route::get('/admin/login', [\App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\AdminAuthController::class, 'login']);


//Route::post('/admin/login', 'AdminAuthController@login');


//Route::post('/stages/{stage}/send-signin-link', [StageUserController::class, 'sendSignInLink'])->name('stages.sendSigninLink');
//Route::post('/stages/{stage}/send-signout-link', [StageUserController::class, 'sendSignOutLink'])->name('stages.sendSignoutLink');

//Route::get('/stages/{stage}/signin/{user}', [StageUserController::class, 'signIn'])->name('stages.signin');
//Route::get('/stages/{stage}/signout/{user}', [StageUserController::class, 'signOut'])->name('stages.signout');

//Route::get('/stage-users', [StageUserController::class, 'getStageUsers']);

Route::get('/about-us', [AboutUsController::class, 'index']);
Route::get('/about-us/{id}', [AboutUsController::class, 'show']);
Route::post('/about-us', [AboutUsController::class, 'store']);
Route::put('/about-us/{id}', [AboutUsController::class, 'update']);
Route::delete('/about-us/{id}', [AboutUsController::class, 'destroy']);


Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/{id}', [GalleryController::class, 'show']);
Route::post('/gallery', [GalleryController::class, 'store']);
Route::put('/gallery/{id}', [GalleryController::class, 'update']);
Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);


require __DIR__.'/auth.php';
