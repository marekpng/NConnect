<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sponsors', [\App\Http\Controllers\SponsorsController::class, 'getAllSponsors']);
//Route::get('/sponsors/getAll', 'SponsorController@getAllSponsors');

