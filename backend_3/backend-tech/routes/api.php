<?php

use App\Http\Controllers\SponsorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\StageUserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CustomSiteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//PROTECTED
Route::middleware('auth:sanctum')->group(function () {
//    SPONSORS
//    Route::post('/create-sponsor', [SponsorController::class, 'createSponsor']);
    Route::get('/sponsors', [SponsorController::class, 'getAllSponsors']);
    Route::get('/sponsors/{id}', [SponsorController::class, 'getSponsor']);
    Route::post('/sponsors', [SponsorController::class, 'createSponsor']);
    Route::post('/sponsors/{id}', [SponsorController::class, 'updateSponsor']);
    Route::put('/sponsors/{id}', [SponsorController::class, 'updateSponsor']);
    Route::delete('/sponsors/{id}', [SponsorController::class, 'deleteSponsor']);


//    LOGOUT ADMIN
    Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout']);

    // You can add more routes here that need authentication

    Route::prefix('stages')->group(function () {
        Route::post('/', [StageController::class, 'store']);
        Route::get('/{stage}', [StageController::class, 'show']);
        Route::put('/{stage}', [StageController::class, 'update']);
        Route::post('/{stage}', [StageController::class, 'update']);
        Route::delete('/{stage}', [StageController::class, 'destroy']);
    });


    //SPEAKERS PROFILE
    Route::prefix('speakers')->group(function () {

        Route::post('/', [SpeakerController::class, 'store']);
        Route::put('/{speaker}', [SpeakerController::class, 'update']);
        Route::post('/{speaker}', [SpeakerController::class, 'update']);
        Route::delete('/{id}', [SpeakerController::class, 'destroy']);

    });

//GALERIA
    Route::post('/gallery', [GalleryController::class, 'store']);
    Route::put('/gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy']);

//POVEDALI O NAS
    Route::post('/about-us', [AboutUsController::class, 'store']);
    Route::put('/about-us/{id}', [AboutUsController::class, 'update']);
    Route::delete('/about-us/{id}', [AboutUsController::class, 'destroy']);



    //Zobraz prihlasenych uzivatelov
    Route::get('/stage-users', [StageUserController::class, 'getStageUsers']);


//    CUSTOM SITES
    Route::post('/custom-sites', [CustomSiteController::class, 'store']);
    Route::put('/custom-sites/{id}', [CustomSiteController::class, 'update']);
    Route::delete('/custom-sites/{id}', [CustomSiteController::class, 'destroy']);
});

    Route::get('stages/', [StageController::class, 'index']);



    Route::post('/register', [\App\Http\Controllers\AdminAuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AdminAuthController::class, 'login']);

//Route::get('/get-stages', [\App\Http\Controllers\StageController::class, 'index']);
//STAGE


//SPEAKERS PROFILE

Route::prefix('speakers')->group(function () {
    Route::get('/', [SpeakerController::class, 'index']);
    Route::get('/{id}', [SpeakerController::class, 'show']);
});


//EMAIL REGISTRACIA
Route::post('/stages/{stage}/send-signin-link', [StageUserController::class, 'sendSignInLink'])->name('stages.sendSigninLink');
Route::post('/stages/{stage}/send-signout-link', [StageUserController::class, 'sendSignOutLink'])->name('stages.sendSignoutLink');

Route::get('/stages/{stage}/signin/{user}', [StageUserController::class, 'signIn'])->name('stages.signin');
Route::get('/stages/{stage}/signout/{user}', [StageUserController::class, 'signOut'])->name('stages.signout');

//POVEDALI O NAS
Route::get('/about-us', [AboutUsController::class, 'index']);
Route::get('/about-us/{id}', [AboutUsController::class, 'show']);


//GALERIA
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/{id}', [GalleryController::class, 'show']);



//SPONSORS TEST
Route::get('/sponsors', [SponsorController::class, 'getAllSponsors']);


Route::get('/custom-sites', [CustomSiteController::class, 'index']);
Route::get('/custom-sites/{id}', [CustomSiteController::class, 'show']);
Route::get('/custom-sites/path/{path}', [CustomSiteController::class, 'showByPath']);







