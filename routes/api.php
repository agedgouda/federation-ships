<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\ShipClassController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\FactionController;
use App\Http\Controllers\ShipTypeController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('ships')->group(function () {
    Route::controller(ShipController::class)->group(function () {
        Route::get('/','index');
        Route::get('/ship/{id}', 'show');
        Route::post('/{id}', 'store');
        Route::put('/{id}', 'update');
        Route::get('/faction/{id}', 'getFactionShips');
        Route::get('/class','classIndex');
        Route::get('/class/{id}', 'getClassShips');
        Route::get('/class/faction/{id}', 'getFactionShipClasses');
    });
});

Route::resource('weapons', WeaponController::class);
Route::resource('factions', FactionController::class);
Route::resource('shiptypes', ShipTypeController::class);

