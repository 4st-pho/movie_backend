<?php

use App\Models\Service;
use App\Http\Controllers\Api\MovieChairController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\api\AdsController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\Room\RoomTypeController;
use App\Http\Controllers\User\UserController;
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


// Category API Route
Route::resource('category',CategoryController::class);

Route::apiResource('services', ServiceController::class);

Route::apiresource('/film', FilmController::class);

Route::apiResource('chairs', MovieChairController::class);



/*
|--------------------------------------------------------------------------
| API Routes Rooms
|--------------------------------------------------------------------------
*/
Route::apiResource('/rooms', RoomController::class);

Route::group(['prefix' => 'rooms'], function () {
    Route::apiResource('/{rooms}/types', RoomTypeController::class);    
});


Route::group(['prefix' => 'user'], function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/login', [UserController::class, 'login']);    
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');    
});


Route::group(
    [
        'prefix' => 'admin', 
        'middleware' => ['auth:sanctum', 'role:admin'] 
    ], 
    function() {
        Route::group(['prefix' => 'users'], function() {
            Route::get('/get', [UserController::class, 'getUsers']);
            Route::post('/update/{user}', [UserController::class, 'updateUser']);
            Route::delete('/remove/{user}', [UserController::class, 'removeUser']);
        });
   
    }
);

Route::apiResource('/ads', AdsController::class);
