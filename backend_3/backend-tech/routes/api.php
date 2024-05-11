<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\StageController;

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
//Route::get('/sponsors', [\App\Http\Controllers\SponsorController::class, 'getAllSponsors']);
Route::get('/sponsors', [\App\Http\Controllers\SponsorController::class, 'getAllSponsors']);

//Route::post('/create-sponsor', [\App\Http\Controllers\SponsorController::class, 'createSponsor']);

//Route::group(['middleware' => ['auth:function']], function () {
//    Route::post('/create-sponsor', [\App\Http\Controllers\SponsorController::class, 'createSponsor']);
//
//});
//Route::middleware('auth:sanctum')->post('/create-sponsor', [\App\Http\Controllers\SponsorController::class, 'createSponsor']);

//PROTECTED
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/create-sponsor', [\App\Http\Controllers\SponsorController::class, 'createSponsor']);
    Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout']);

    // You can add more routes here that need authentication
});
    Route::post('/register', [\App\Http\Controllers\AdminAuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\AdminAuthController::class, 'login']);

//Route::get('/get-stages', [\App\Http\Controllers\StageController::class, 'index']);
//STAGE
Route::prefix('stages')->group(function () {
    Route::get('/', [StageController::class, 'index']);
    Route::post('/', [StageController::class, 'store']);
    Route::get('/{stage}', [StageController::class, 'show']);
    Route::put('/{stage}', [StageController::class, 'update']);
    Route::delete('/{stage}', [StageController::class, 'destroy']);
});
