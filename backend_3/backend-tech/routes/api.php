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

//Route::post('/test-post', [TestController::class, 'testPost']);
//Route::post('/test-file', [TestController::class, 'testFile']);
//Route::get('/get-user/{id}', [TestController::class, 'findUserById']);
//Route::post('/save-user', [TestController::class, 'createUser']);
//Route::post('/add-user-addr', [TestController::class, 'addUserAddress']);
//Route::post('/get-user-by-phone', [TestController::class, 'findUserByPhone']);
//Route::delete('/delete-user/{id}', [TestController::class, 'deleteUser']);
//Route::patch('/update-user/{id}', [TestController::class, 'updateUser']);
//Route::post('/show-request', [TestController::class, 'getRequestData'])
//    ->middleware(['time']);

//PUBLIC
//SPONSORS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//Route::get('/sponsors', [\App\Http\Controllers\SponsorController::class, 'getAllSponsors']);
//Route::get('/sponsors', [\App\Http\Controllers\SponsorController::class, 'getAllSponsors']);

//Route::post('/create-sponsor', [\App\Http\Controllers\SponsorController::class, 'createSponsor']);

//Route::group(['middleware' => ['auth:function']], function () {
//    Route::post('/create-sponsor', [\App\Http\Controllers\SponsorController::class, 'createSponsor']);
//
//});
//Route::middleware('auth:sanctum')->post('/create-sponsor', [\App\Http\Controllers\SponsorController::class, 'createSponsor']);

//PROTECTED
Route::middleware('auth:sanctum')->group(function () {
//    SPONSORS
    Route::post('/create-sponsor', [SponsorController::class, 'createSponsor']);



    Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout']);

    // You can add more routes here that need authentication

    Route::prefix('stages')->group(function () {
        Route::post('/', [StageController::class, 'store']);
        Route::get('/{stage}', [StageController::class, 'show']);
        Route::put('/{stage}', [StageController::class, 'update']);
        Route::delete('/{stage}', [StageController::class, 'destroy']);
    });


    //SPEAKERS PROFILE
    Route::prefix('speakers')->group(function () {

        Route::post('/', [SpeakerController::class, 'store']);
        Route::put('/{speaker}', [SpeakerController::class, 'update']);
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
//Route::post('/create-sponsor', [SponsorController::class, 'createSponsor']);
//Route::put('/sponsors/{id}', [SponsorController::class, 'updateSponsor']);
//Route::delete('/sponsors/{id}', [SponsorController::class, 'deleteSponsor']);




