<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::prefix('user')->group(function() {
    Route::post('check-email-account', [UserController::class, 'checkEmailAccount'])->name('user-check-email-account-api');
    Route::post('create-account', [UserController::class, 'createAccount'])->name('user-create-account-api');
});

Route::prefix('location')->group(function() {
    Route::get('countries', [LocationController::class, 'listCountries'])->name('location-list-countries-api');
    Route::get('states/{country}', [LocationController::class, 'lsitStates'])->name('location-list-states-api');
    Route::get('cities/{country}', [LocationController::class, 'lsitCities'])->name('location-list-cities-api');
});
